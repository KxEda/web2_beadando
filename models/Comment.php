<?php


class Comment
{
    public $id;
    public $news_id;
    public $user_id;
    public $created_at;
    public $content;

    function __construct($param)
    {
        $this->id = $param['id'];
        $this->news_id = $param['news_id'];
        $this->user_id = $param['user_id'];
        $this->created_at = $param['created_at'];
        $this->content = $param['content'];
    }
}
