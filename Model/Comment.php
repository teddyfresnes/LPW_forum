<?php

class Comment
{
    private $id;
    private $text;
    private $authorId;
    private $createdAt;
    private $topicId;
    private $parentId;

    public function __construct(array $data)
    {
        $this->id = $data['_id'] ?? null;
        $this->text = $data['text'] ?? '';
        $this->authorId = $data['author'] ?? null;
        $this->createdAt = $data['createdAt'] ?? null;
        $this->topicId = $data['topicId'] ?? null;
        $this->parentId = $data['parentId'] ?? null;
    }

    // getters
    public function getId()
    {
        return $this->id;
    }

    public function getText()
    {
        return $this->text;
    }

    public function getAuthorId()
    {
        return $this->authorId;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function getTopicId()
    {
        return $this->topicId;
    }

    public function getParentId()
    {
        return $this->parentId;
    }

    // setters
    public function setText($text)
    {
        $this->text = $text;
    }

    public function setAuthorId($authorId)
    {
        $this->authorId = $authorId;
    }

    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    public function setTopicId($topicId)
    {
        $this->topicId = $topicId;
    }

    public function setParentId($parentId)
    {
        $this->parentId = $parentId;
    }
}
?>