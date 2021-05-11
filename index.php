<?php

//$user = new User(1);
////var_dump(1);
$url=parse_url(getenv("CLEARDB_DATABASE_URL"));
$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"],1);
$link = mysqli_connect($server, $username, $password);
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}else{
    $user = mysqli_query($link,'SELECT * FROM user WHERE `id` ='.id);
    var_dump($user);
}
