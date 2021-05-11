<?


class User{
    private $id;
    private $login;
    private $pass;
    private $link;

    public function __construct()
    {
        $url= parse_url(getenv("CLEARDB_DATABASE_URL"));
        $server = $url["host"];
        $username = $url["user"];
        $password = $url["pass"];
        $db = substr($url["path"],1);
        $this->link = mysqli_connect($server, $username, $password);
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }


    }
    public function login($user_login, $password) {
        $user = mysqli_query($this->link, 'SELECT * FROM users WHERE `login` = "'.$user_login.'"');
        var_dump('SELECT * FROM users WHERE login = "'.$user_login.'"');
        return $user;
    }


}
