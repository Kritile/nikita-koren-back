<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');
error_reporting(E_ALL);
ini_set("display_errors", 1);
include "../../../model/table.php";
$table = new Table();
echo json_encode( $table->getListById($_GET['id']));
