<?php
include "../../../model/users";
var_dump($_POST);
if(isset($_POST['login']) && isset($_POST['pass'])){
    $user = new User();
    echo json_encode( $user->login($_POST['login'],$_POST['pass']));
}else{
    echo 'Only POST request';
}
