<?php

require_once PROJECT_ROOT_PATH . "/Model/ProductLineModel.php";

class ProductLineController extends BaseController
{
    public function getProductLines()
    {
        $this->apiCall('ProductLineModel', 'getProductLines');
    }

    public function getTotalProductLines()
    {
        $this->apiCall('ProductLineModel', 'getTotalProductLines');
    }
}
