<?php

require("./reusable/header.php");
require("./reusable/menu.php");

$newsId = $_GET["news_id"];
?>


<form method="POST" action="./process/process_add_comment.php">
    <div class="form-group">
        <label for="content">Content</label>
        <textarea class="form-control" id="content" rows="10" name="content"></textarea>
    </div>
    <input type="hidden" name="news_id" value="<?php echo $newsId; ?>">
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php
require("./reusable/footer.php");
?>