<?php
require "../classes/User.php";

$u = new User; //create an instance of the class
$u -> deleteUser($_POST['id']); //send the $id from the hidden input to the deleteUSer function

?>