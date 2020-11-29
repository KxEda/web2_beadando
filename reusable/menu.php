<?php


require_once('./reusable/get_connection.php');

$conn = get_connection();

$sql = "SELECT * FROM `menuitem` WHERE 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

?>



    <nav class="navbar navbar-expand-lg navbar-light bg-light">


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

                <?php
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $row['link'] ?>"><?php echo $row['title']; ?></a>
                    </li>
                <?php
                }
                ?>


                <!-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li> -->
            </ul>
        </div>
    </nav>






    <ul>
        <?php

        while ($row = $result->fetch_assoc()) {
        ?>
            <li>
                <a href="<?php echo $row['link'] ?>"><?php echo $row['title']; ?></a>
            </li>
        <?php
        }
        ?>
    </ul>
<?php
} else {
    echo "No menu item";
}
$conn->close();
?>