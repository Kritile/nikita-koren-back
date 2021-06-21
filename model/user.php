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
        }else{
            mysqli_set_charset($this->link,'utf8');
        }


    }

    public function login($user_login, $password)
    {
        $user = mysqli_fetch_assoc(mysqli_query($this->link, 'SELECT * FROM users WHERE `login` = "' . $user_login . '"'));
        if ($user) {
            if ($password === $user['pass']) {
                return $user['id'];
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

    public function add_table($id,$table_id){
        $query = "INSERT INTO user_tables (user_id, table_id) VALUE (".$id.",".$table_id.")";
        mysqli_query($this->link, $query);
    }
    public function get_by_table($table_id){
        $users = [];
        $query = "SELECT user_id FROM user_tables WHERE table_id=".$table_id;
        $userIds = mysqli_fetch_all(mysqli_query($this->link, $query));
        foreach ($userIds as $value){
            var_dump($value);
            $query2 = "SELECT * FROM users WHERE id=".$value[0];
            $users[] = mysqli_fetch_all(mysqli_query($this->link, $query2));
        }
        return $users;
    }


}
