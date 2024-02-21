<?php

require_once PROJECT_ROOT_PATH . "/Model/Database.php";

class ProductLinesModel extends database
{
    public function getProductLines()
    {
        return $this->query("SELECT * from productlines");
    }

    public function getTotalProductLines()
    {
        return $this->query("SELECT count(distinct productLine) as total_productLine from productlines");
    }
}
