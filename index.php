<?php
include './model/user.php';
error_reporting(E_ALL);
ini_set('display_errors', 'On');
$user = new User();
echo '<br>';
echo '<p>Логин</p>';
var_dump($user->login('user','pass'));
echo '</br>';


echo '<br>';
echo '<p>Регистрация</p>';
var_dump($user->register_user('user','pass'));
echo '</br>';


echo '<br>';
echo '<p>Регистрация</p>';
var_dump($user->register_user('admin','pass'));
echo '</br>';

