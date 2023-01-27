<?php

class Task
{
    private $status;
    private $content;
    private $id;


    public function __construct($content, $status = false, $id = null)
    {
        $this->content = $content;
        $this->status = $status;
        $this->id = $id;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status): void
    {
        $this->status = $status;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content): void
    {
        $this->content = $content;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }



}