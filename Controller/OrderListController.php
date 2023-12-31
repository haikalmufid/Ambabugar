<?php

include '../Model/db_connection.php';

class OrderListController
{
    private $db;

    public function __construct()
    {
        $this->db = new DatabaseConnection();
    }

    public function getOrderList($id)
    {
        $conn = $this->db->getConnection();

        $sql = "SELECT * FROM reservation WHERE id = $id";
        $result = $conn->query($sql);

        $orderList = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $orderList[] = $row;
            }
        }

        return $orderList;
    }
}

?>
