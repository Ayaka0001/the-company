<?php

require "../classes/User.php";

$u = new User;

$u -> uploadPhoto($_POST, $_FILES); // passing the form data and the files and the actual file from the form
?>