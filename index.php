<?php
include './model/user.php';
include './model/table.php';
include './model/card.php';
include './model/group.php';
error_reporting(E_ALL);
ini_set('display_errors', 'On');
$card = new User();
echo '<pre>';
var_dump($card->get_by_table(35));
echo '</pre>';


