<?php

require_once PROJECT_ROOT_PATH . "/Model/OrderDetailsModel.php";

class OrderDetailController extends BaseController
{
    public function getOrderDetails()
    {
        $this->apiCall('OrderDetailsModel', 'getOrderDetails');
    }

    public function getTotalOrderDetails()
    {
        $this->apiCall('OrderDetailsModel', 'getTotalOrderDetails');
    }
}
