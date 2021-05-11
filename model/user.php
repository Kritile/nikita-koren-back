<?


class User
{
    private $id;
    private $login;
    private $pass;
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

    public function login($user_login, $password)
    {
        $user = mysqli_fetch_assoc(mysqli_query($this->link, 'SELECT * FROM users WHERE `login` = "' . $user_login . '"'));
        if ($user) {
            var_dump(mysqli_error($this->link));
            if ($password === $user['pass']) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function register_user($user_login, $password)
    {
        $query = 'INSERT INTO users (login, pass) VALUES ("' . $user_login . '", "' . $password . '")';
        return mysqli_query($this->link, $query);
    }


}
