<?php

class Recipe
{
    private $id, $user_id, $title, $content;



    public function getId()
    {
        return $this->id;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function getTitle()
    {
        return  $this->title;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }
}
