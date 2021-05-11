<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
include "../../../model/table.php";
$table = new Table();
echo json_encode( $table->getListById($_GET['id']));
