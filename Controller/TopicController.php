<?php

use MongoDB\Collection;
use MongoDB\BSON\ObjectId;

class TopicController
{
    private $topicManager;

    public function __construct(TopicManager $topicManager)
    {
        $this->topicManager = $topicManager;
    }

    public function display()
    {
        $topics = $this->topicManager->getAllTopics();

        require('./View/home.php');
    }



    public function displayTopicDetails($topicId)
    {
        $topic = $this->topicManager->getTopicDetails($topicId);

        if ($topic) {
            $comments = $topic['comments'];
            require('./View/topicDetails.php');
        }
        else {
            echo "Sujet non trouvé";
        }
    }


    public function submitReply()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $replyText = $_POST['replyText'];
            $commentId = $_POST['commentId'];
            $topicId = $_POST['topicId'];

            $this->topicManager->submitReply([
                '_id' => new ObjectId(),
                'text' => $replyText,
                'author' => $_SESSION['user']['_id'],
                'createdAt' => new DateTime(),
                'parentId' => $commentId,
                'topicId' => new ObjectId($topicId),
            ]);
        }

        header('Location: index.php?ctrl=topic&action=displayTopicDetails&topicId='.$topicId);
    }


    public function createTopic()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $content = $_POST['content'];

            $topicId = $this->topicManager->createTopic([
                'title' => $title,
                'content' => $content,
                'creator' => $_SESSION['user']['_id'],
            ]);

            header('Location: index.php?ctrl=topic&action=displayTopicDetails&topicId=' . $topicId);
            exit;
        }

        include('./View/createTopic.php');
    }
}


?>