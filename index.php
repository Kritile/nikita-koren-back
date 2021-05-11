<?php
include './model/user.php';
error_reporting(E_ALL);
ini_set('display_errors', 'On');
$user = new User();
$user_check = $user->login('user','pass');
if(!$user_check){
    var_dump(mysqli_error());
    var_dump(mysqli_errno());
}
////var_dump(1);

