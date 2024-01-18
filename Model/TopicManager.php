<?php

use MongoDB\Collection;
use MongoDB\BSON\ObjectId;

require_once "./Model/Topic.php";

class TopicManager
{
    private $collection;
    private $userManager;
    private $commentManager;

    public function __construct(Collection $collection, UserManager $userManager, CommentManager $commentManager)
    {
        $this->collection = $collection;
        $this->userManager = $userManager;
        $this->commentManager = $commentManager;
    }

    public function getAllTopics()
    {
        $topics = $this->collection->find();
        $topicsArray = iterator_to_array($topics);

        foreach ($topicsArray as &$topic) {
            $topic['name'] = $this->userManager->getFullNameById($topic['creator']);
        }

        return $topicsArray;
    }


    public function getTopicDetails(string $topicId)
    {
        try {
            new ObjectId($topicId);
        }
        catch (\Exception $e) {
            return null;
        }

        $topic = $this->collection->findOne(['_id' => new ObjectId($topicId)]);

        if (!$topic) {
            return null;
        }

        // on cherche les infos du createur dans usermanager
        $creatorDetails = $this->userManager->getDetailsById($topic['creator']);
        // on récupère les commentaires et leurs infos
        $commentDetails = $this->commentManager->getCommentsDetailsByTopicId($topicId);

        // on rajoute dans la variable topic
        $topic['creatorDetails'] = $creatorDetails;
        $topic['commentsDetails'] = $commentDetails;

        return $topic;
    }



    public function submitReply($data)
    {
        // acces a commentmanager
        $this->commentManager->createComment($data);
    }

    public function getTopicIdByCommentId($commentId) {
        $comment = $this->collection->findOne(['_id' => new ObjectId($commentId)]);
    
        if ($comment && isset($comment['topicId'])) {
            return $comment['topicId'];
        }
        else {
            return null;
        }
    }


    public function createTopic($data)
    {
        // creation du commentaire
        $commentData = [
            '_id' => new ObjectId(),
            'text' => $data['title'],
            'author' => $data['creator'],
            'createdAt' => new DateTime(),
            'topicId' => null,
            'parentId' => null,
        ];
        $mainComment = $this->commentManager->createComment($commentData);


        // creation du topic
        $topicResult = $this->collection->insertOne([
            'title' => $data['title'],
            'creator' => $data['creator'],
            'createdAt' => new MongoDB\BSON\UTCDateTime($mainComment->getCreatedAt()->getTimestamp() * 1000),
            'comments' => [$mainComment->getId()],
        ]);
        $topicId = (string) $topicResult->getInsertedId();

        // après avoir creer le topic, on ajoute son id dans le comment pour topicId
        $this->commentManager->updateCommentTopicId($mainComment->getId(), $topicId);

        return $topicId;
    }
}

?>