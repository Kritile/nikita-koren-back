<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
include "../../../model/user.php";
$user = new User();
echo json_encode( $user->login($_POST['login'],$_POST['pass']));

