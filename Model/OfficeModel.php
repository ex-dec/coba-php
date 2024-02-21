<?php

require_once PROJECT_ROOT_PATH . "/Model/Database.php";

class OfficeModel extends database
{
    public function getOffices()
    {
        return $this->query("SELECT * from offices");
    }

    public function getTotalOffices()
    {
        return $this->query("SELECT count(distinct officeCode) as Total_Offices from offices;");
    }

    public function checkOfficeByCountry()
    {
        return $this->query(
            "SELECT country , count(officeCode) as Total_Offices from offices 
            group by country
            order by Total_Offices desc"
        );
    }
}
