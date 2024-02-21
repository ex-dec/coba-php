<?php

require_once PROJECT_ROOT_PATH . "/Model/OrderModel.php";

class OrderController extends BaseController
{
    public function getOrders()
    {
        $this->apiCall('OrderModel', 'getOrders');
    }

    public function getTotalOrders()
    {
        $this->apiCall('OrderModel', 'getTotalOrders');
    }

    public function getTotalShipOrders()
    {
        $this->apiCall('OrderModel', 'getTotalShipOrders');
    }
}
