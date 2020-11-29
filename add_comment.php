<?php

require("./reusable/header.php");
require("./reusable/menu.php");

?>


<form method="POST" action="./process/process_add_comment.php">
    <div class="form-group">
        <label for="content">Content</label>
        <textarea class="form-control" id="content" rows="10" name="content"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php
require("./reusable/footer.php");
?>