<?php
include './model/user.php';
include './model/table.php';
include './model/card.php';
error_reporting(E_ALL);
ini_set('display_errors', 'On');
$user = new Card();
echo '<pre>';
var_dump($user->getCardListByTable(1));
echo '</pre>';


