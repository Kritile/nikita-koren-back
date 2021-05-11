<?


class Card
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
        }else{
            mysqli_set_charset($this->link,'utf8');
        }


    }

    public function getCardListByTable($table_id) {
        $query = 'SELECT card_id FROM `group` WHERE table_id = "'.$table_id.'"';
        $card_ids = array();
        $cards = array();
        var_dump($query);
        mysqli_query($this->link, $query);
        var_dump(mysqli_error($this->link));
        foreach(mysqli_fetch_all(mysqli_query($this->link, $query)) as $key => $value){
            $card_ids[] = $value[0];
        }
        foreach($card_ids as $key => $value){
            $query = 'SELECT * FROM `card` WHERE id = "'.$value.'"';
            $cards[] = mysqli_fetch_assoc(mysqli_query($this -> link, $query));

        }
        return $cards;
    }
    public function getCardListByUser($user_id) {
        $query = 'SELECT card_id FROM `user_group` WHERE user_id = "'.$user_id.'"';
        $card_ids = array();
        $cards = array();
        foreach(mysqli_fetch_all(mysqli_query($this->link, $query)) as $key => $value){
            $card_ids[] = $value[0];
        }
        foreach($card_ids as $key => $value){
            $query = 'SELECT * FROM `card` WHERE id = "'.$value.'"';
            $cards[] = mysqli_fetch_assoc(mysqli_query($this -> link, $query));

        }
        return $cards;
    }
}