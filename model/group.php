<?
class Group
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
    public function get_all_group($uid, $table_id){
        $query = "SELECT * FROM `group` WHERE  table_id = ".$table_id;
        return  mysqli_fetch_all(mysqli_query($this->link, $query));
    }
    public function get_name($id){
        $query = 'SELECT name FROM `group` WHERE id = "'.$id.'"';
        return mysqli_fetch_all(mysqli_query($this->link,$query));
    }

    public function create_group($table_id, $name){
        $query = "INSERT INTO `group` (table_id,name) value (".$table_id.", '".$name."')";
        mysqli_query($this->link,$query);
    }
    public function delete($id){
        $query = "DELETE FROM `group` WHERE id = ".$id;
        mysqli_query($this->link,$query);
    }
    public function change_name($id,$name){
        $query = "UPDATE `group` SET name = '".$name."' WHERE id = ".$id;
        mysqli_query($this->link,$query);
    }
}

