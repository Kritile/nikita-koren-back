<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
include "../../../model/group.php";
$card = new Group();
echo json_encode( $card->get_name(5));
