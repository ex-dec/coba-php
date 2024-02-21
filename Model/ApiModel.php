<?php

require_once PROJECT_ROOT_PATH . "/Model/Database.php";

class ApiModel extends Database
{
    public function example()
    {
        return $this->query("SHOW databases;");
    }

    public function highCustomer()
    {
        return $this->query("select Country, Count(*) Total_Customers
        from customers
        group by country
        order by Total_Customers desc");
    }
}
