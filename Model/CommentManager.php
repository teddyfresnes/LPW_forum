<?php
use MongoDB\Collection;
use MongoDB\BSON\ObjectId;
use MongoDB\BSON\UTCDateTime;

require_once "./Model/Comment.php";

class CommentManager
{
    private Collection $collection;
    private UserManager $userManager;

    public function __construct(Collection $collection, UserManager $userManager)
    {
        $this->collection = $collection;
        $this->userManager = $userManager;
    }

    public function getCommentsDetailsByTopicId(string $topicId)
    {
        try {
            new ObjectId($topicId);
        } catch (\Exception $e) {
            return null;
        }

        $comments = $this->collection->find(['topicId' => new ObjectId($topicId)]);

        $commentsDetails = [];

        foreach ($comments as $comment) {
            // on recupere toute les infos autheur du comment
            $authorDetails = $this->userManager->getDetailsById($comment['author']);
            $comment['authorDetails'] = $authorDetails;

            $commentsDetails[] = $comment;
        }

        return $commentsDetails;
    }


    public function getCommentById($commentId)
    {
        return $this->collection->findOne(['_id' => new MongoDB\BSON\ObjectId($commentId)]);
    }
    

    public function createComment($data)
    {
        if (!($data['createdAt'] instanceof DateTime)) {
            $data['createdAt'] = new DateTime($data['createdAt']);
        }
        //var_dump($data);
        $data['parentId'] = ($data['parentId'] !== null && $data['parentId'] !== '' && !($data['parentId'] instanceof ObjectId))
            ? new ObjectId($data['parentId'])
            : $data['parentId'];

        $comment = new Comment($data);

        // send to mongodb
        $this->collection->insertOne([
            '_id' => $comment->getId(),
            'text' => $comment->getText(),
            'author' => $comment->getAuthorId(),
            'createdAt' => new MongoDB\BSON\UTCDateTime($comment->getCreatedAt()->getTimestamp() * 1000),
            'topicId' => $comment->getTopicId(),
            'parentId' => $comment->getParentId(),
        ]);

        return $comment;
    }


    public function updateCommentTopicId($commentId, $topicId) {
        $filter = ['_id' => new ObjectId($commentId)];
        $update = ['$set' => ['topicId' => new ObjectId($topicId)]];
        $this->collection->updateOne($filter, $update);
    }
}

?>