<?php

require_once PROJECT_ROOT_PATH . "/Model/Database.php";

class OrderDetailsModel extends Database
{
    public function getOrderDetails()
    {
        return $this->query("SELECT * from orderdetails;");
    }

    public function getTotalOrderDetails()
    {
        return $this->query("SELECT count(distinct orderNumber) as Total_Orders from orders");
    }
}
