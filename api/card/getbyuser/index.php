<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
include "../../../model/card.php";
$card = new Card();
echo json_encode( $card->getCardListByTable($_GET['id']));
