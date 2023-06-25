<?php


class Database
{
    private $conn;

    public function __construct($dbName, $dbUser, $dbPass, $dbHost)
    {
        if (!$this->conn) {
            //echo "<hr></hr>Connecting<hr>";
            $this->conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
            if ($this->conn->connect_error) {
                die("Connection failed: " . $this->conn->connect_error);
            }
            $this->conn->query("SET time_zone='+0:00';");
        }
    }

    public function getConn()
    {
        if ($this->conn) {
            return $this->conn;
        }
    }

    public function executeQuery($sql)
    {
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }else{
            return Null;
        }
    }


    public function countQuery($sql)
    {
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            return $result->num_rows;
        }else{
            return Null;
        }
    }

    public function insertQuery($sql)
    {
        $result = $this->conn->query($sql);
        if($result){
            $last_id = $this->conn->insert_id;
            return $last_id;
        }else{
            return false;
        }

    }

    function __destruct()
    {
        //echo "<hr>Disconnecting<hr>";
        $this->conn->close();
    }
}