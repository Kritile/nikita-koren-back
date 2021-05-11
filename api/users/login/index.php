<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
include "../../../model/user.php";
var_dump($_POST);
echo "<pre>".print_r($GLOBALS, true)."</pre>";
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $user = new User();
    echo json_encode( $user->login($_POST['login'],$_POST['pass']));
}else{
    echo 'Only POST request';
}
