<?php
require "../classes/User.php";

$u = new User; //create an instance of the class
$u -> updateUser($_POST); //set all the $_POST values of the instance $u into the updateUser function
?>