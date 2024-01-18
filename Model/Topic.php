<?php
use MongoDB\BSON\ObjectId;

class Topic
{
    private $id;
    private $title;
    private $creatorId;
    private $createdAt;
    private $comments;

    public function __construct($title, $creatorId, $createdAt)
    {
        $this->id = new ObjectId();
        $this->title = $title;
        $this->creatorId = $creatorId;
        $this->createdAt = $createdAt;
        $this->comments = [];
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getCreatorId()
    {
        return $this->creatorId;
    }

    public function setCreatorId($creatorId)
    {
        $this->creatorId = $creatorId;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt)
    {
        if (!($createdAt instanceof DateTime)) {
            $createdAt = new DateTime($createdAt);
        }

        $this->createdAt = $createdAt;
    }

    public function getComments()
    {
        return $this->comments;
    }

    public function addComment($comment)
    {
        $this->comments[] = $comment;
    }
}

?>