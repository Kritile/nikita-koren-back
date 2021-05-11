<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
include "../../../model/user.php";
$user = new User();
echo json_encode( $user->register_user($_GET['login'],$_GET['pass']));
