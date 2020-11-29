
<?php


class News
{
    public $id;
    public $title;
    public $content;
    public $created_at;
    public $user_id;
    public $comments;

    function __construct($param)
    {
        $this->id = $param['id'];
        $this->title = $param['title'];
        $this->content = $param['content'];
        $this->created_at = $param['created_at'];
        $this->user_id = $param['user_id'];
        $this->comments = array();
    }
}
