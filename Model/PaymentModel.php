<?php

require_once PROJECT_ROOT_PATH . "/Model/Database.php";

class PaymentModel extends Database
{
    public function getPayments()
    {
        return $this->query("SELECT * from payments");
    }

    public function getTotalAmount()
    {
        return $this->query("SELECT sum(amount) Total_Amount from payments");
    }

    public function getAmountPaid()
    {
        return $this->query(
            "SELECT customerNumber, sum(amount) as Total_Payment
             from payments 
             group by customerNumber"
        );
    }

    public function getTotalAmountByYear()
    {
        return $this->query("SELECT year(paymentDate) as Year,
        sum(amount) as Total_Amount,
        sum(sum(amount)) over( order by Year(paymentDate)) as Sum_Of_Amount
        from payments
        group by Year
        order by Year");
    }

    public function getTotalAmountByYearAndMonth()
    {
        return $this->query("SELECT year(paymentDate) as Year,
        monthname(paymentDate) as Month_Name,
        sum(amount) as Total_Amount
        from payments
        group by Year,month(paymentDate),Month_Name 
        order by Year,month(paymentDate),Month_Name");
    }
}
