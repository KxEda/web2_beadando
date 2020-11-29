<?php

require("./reusable/header.php");
require("./reusable/menu.php");

require_once("./reusable/get_connection.php");
require_once("./models/News.php");
require_once("./models/Comment.php");

function createCard($news)
{
    $start =
        "<div class='card' style='width: 18rem;'>            
        <div class='card-body'>
            <h5 class='card-title'>$news->title - by $news->user_id at $news->created_at</h5>
            <p class='card-text'>$news->content</p>";
    $end =
        "<a href='#' class='btn btn-primary'>Comment</a>
        </div>
     </div>";

    $comments = "";

    if (count($news->comments) > 0) {
        $comments = $comments . " <ul class='list-group list-group-flush'>";
        foreach ($news->comments as $comment) {
            $comments = $comments .  "<li class='list-group-item'>
                $comment->content <br> 
                by $comment->user_id <br>
                at $comment->created_at
            </li>";
        }
        $comments = $comments . "</ul>";
    }

    return $start . $comments . $end;
}

function getNews()
{
    $conn = get_connection();

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $newsArray = array();

    $sql = "SELECT * FROM news";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($newsRow = $result->fetch_assoc()) {
            $news = new News($newsRow);
            $newsArray[$news->id] = $news;
        }
    }
    return  $newsArray;
}

function getComments()
{
    $conn = get_connection();

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $commentsArray = array();

    $sql = "SELECT * from comment";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($commentRow = $result->fetch_assoc()) {
            $comment = new Comment($commentRow);
            $commentsArray[$comment->id] = $comment;
        }
    }
    return $commentsArray;
}

function addCommentsToNews($newsArray, $commentsArray)
{

    foreach ($commentsArray as $comment) {
        if (isset($newsArray[$comment->news_id])) {
            $newsArray[$comment->news_id]->comments[] = $comment;
        }
    }
}

function printNews($newsArray)
{

    if (count($newsArray) < 1) {
        echo "No news to show.";
        return;
    }

    $count = 0;
    foreach ($newsArray as $news) {
        if ($count % 3 == 0) {
            echo "<div class='card-deck'>";
        }
        echo createCard($news);
        if ($count % 3 == 2) {
            echo "</div>";
        }
        $count += 1;
    }
}

$news = getNews();
$comments = getComments();
addCommentsToNews($news, $comments);
printNews($news);

?>

<?php
require("./reusable/footer.php");
?>