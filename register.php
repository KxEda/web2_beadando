<?php

require("./reusable/header.php");
require("./reusable/menu.php");

?>


<form method="POST" action="./process/process_register.php">
    <div class="form-group">
        <label for="userName">User name</label>
        <input type="text" class="form-control" id="userName" placeholder="User name" name="name" required>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email" required>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php
require("./reusable/footer.php");
?>