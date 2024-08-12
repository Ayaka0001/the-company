<?php

require "../classes/User.php";
//the data starts at the form, and is submitted here. then the constructor method of the Database.php is called.

$user = new User;
//by making a new instance, it calls the constructor of the database.php.

$user -> createUser($_POST);
// by setting the variable to $_POST, it passes the entire array of the input value.
?>