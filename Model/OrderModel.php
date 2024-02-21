<?php

require_once PROJECT_ROOT_PATH . "/Model/Database.php";

class OrderModel extends Database
{
    public function getOrders()
    {
        return $this->query("SELECT * from orders");
    }

    public function getTotalOrders()
    {
        return $this->query(
            "SELECT year(orderDate) as Year,
                    MONTH(orderDate) AS Month,
                    monthname(orderDate) as Month_Name,
                    count(orderNumber) as Total_orders,
                    sum( count(orderNumber) ) over ( partition by Year(orderDate) 
             order by MONTH(orderDate) asc) as Sum_Of_Orders from orders
             group by Year,Month,Month_Name
             order by Year,Month asc;"
        );
    }

    public function getTotalShipOrders()
    {
        return $this->query(
            "SELECT status, count(orderNumber) as Total_Orders 
            from orders 
            where status = 'Shipped';"
        );
    }
}
