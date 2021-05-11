<?php
include "../../../model/user.php";
if (isset($_POST['login']) && isset($_POST['pass'])) {
    $user = new User();
    echo json_encode($user->register_user($_POST['login'], $_POST['pass']));
} else {
    echo 'Only POST request';
}