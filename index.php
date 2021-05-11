<?php
include './model/user.php';
include './model/table.php';
error_reporting(E_ALL);
ini_set('display_errors', 'On');
$user = new Table();
echo '<pre>';
var_dump($user->getListById(1));
echo '</pre>';


