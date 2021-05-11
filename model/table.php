<?php

class Table
{
    private $link;

    public function __construct()
    {
        $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
        $server = $url["host"];
        $username = $url["user"];
        $password = $url["pass"];
        $db = substr($url["path"], 1);
        $this->link = mysqli_connect($server, $username, $password, 'heroku_33710f2ff7d17f7');
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }


    }
    public function getListById($user_id){
        $query = 'SELECT table_id FROM user_tables WHERE user_id = "'.$user_id.'"';
        return mysqli_fetch_assoc(mysqli_query($this->link, $query));

    }
}