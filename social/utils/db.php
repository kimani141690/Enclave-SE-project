<?php


class Database
{
    public $conn;
    private $hostname = "database-1.cqjxrkfej1rs.ap-northeast-1.rds.amazonaws.com";
    private $username = 'admin';
    private $password = 'enclaveSE';
    private $database = 'enclave';
    function __construct()
    {
        $this->conn = mysqli_connect($this->hostname, $this->username, $this->password, $this->database);
    }

    function __destruct()
    {
        mysqli_close($this->conn);
    }
    public function executeQuery($query)
    {
        return mysqli_query($this->conn, $query);
    }

    public function format_date($date_str){
        $date_made = date_create($date_str);
        return date_format($date_made,"jS F Y");

    }

    public function get_error(){
        return mysqli_error($this->conn);
    }
    
}

?>
