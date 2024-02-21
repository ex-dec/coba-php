<?php

require_once PROJECT_ROOT_PATH . "/Model/Database.php";

class CustomerModel extends Database
{
    public function getCustomers()
    {
        return $this->query("SELECT * from customers");
    }

    public function getTotalCustomers()
    {
        return $this->query("SELECT count(distinct customerNumber) as total_customers from customers");
    }

    public function checkNullCustomer()
    {
        return $this->query("SELECT customerNumber from customers where customerNumber is null");
    }
}
