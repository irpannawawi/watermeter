<?php
class pembayaran
{
    private $conn;
    private $db;
    function __construct($db)
    {
        $this->db = $db;
    }

    public function getAll()
    {
        $sql = "SELECT pembayaran.all * FROM customer  ORDER BY customerId ASC";
        return $this->db->executeQuery($sql);
    }

}