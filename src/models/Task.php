<?php

class Task
{
    private $status;
    private $content;


    public function __construct($content, $status)
    {
        $this->content = $content;
        $this->status = $status;
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



}