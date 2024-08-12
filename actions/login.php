<?php

require "../classes/User.php";

$user = new User;
//↑ calls the constructor of the User.php

$user -> login($_POST);
//sets all the $_POST values into the login function
?>