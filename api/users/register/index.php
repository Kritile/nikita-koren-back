<?php
include "../../../model/users";
if(isset($_POST)){
    if(isset($_POST['login']) && isset($_POST['pass'])){
        $user = new User();
        echo json_encode( $user->register_user($_POST['login'],$_POST['pass']));
    }
}