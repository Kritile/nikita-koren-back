<?php
include "../../../model/user.php";
if($_SERVER['REQUEST_METHOD'] == "GET"){
    $user = new User();
    echo json_encode( $user->login($_GET['login'],$_GET['pass']));
}else{
    echo 'Only POST request';
}
