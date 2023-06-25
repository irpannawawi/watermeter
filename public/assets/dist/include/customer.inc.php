<?php
class customer
{
    private $conn;
    private $db;
    function __construct($db)
    {
        $this->db = $db;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM pembayaran JOIN customer ON pembayaran.pembayaranId = customer.customerId";
        return $this->db->executeQuery($sql);
    }

}