<?php
class dbcontroller
{
    private $host = '127.0.0.1';
    private $user = 'root';
    private $password = '';
    private $database = 'uas_basis_data';
    private $connect;

    public function __construct()
    {
        $this->connect = $this->connectDB();
    }

    private function connectDB()
    {
        $connect = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        return $connect;
    }

    public function runQuery($query)
    {
        $result = mysqli_query($this->connect, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $resultset[] = $row;
        }
        if (!empty($resultset)) {
            return $resultset;
        }
    }

    public function runSQL($sql)
    {
        $result = mysqli_query($this->connect, $sql);
    }
    
}

?>