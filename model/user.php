<?


class User{
    private $id;
    private $login;
    private $pass;

    public function __construct($id)
    {
        $url=parse_url(getenv("CLEARDB_DATABASE_URL"));
        $server = $url["host"];
        $username = $url["user"];
        $password = $url["pass"];
        $db = substr($url["path"],1);
        $mysqli = new mysqli($server, $username, $password);
        $user = $mysqli->query('SELECT * FROM user WHERE `id` ='.id);
        var_dump($user);
    }


}