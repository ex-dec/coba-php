<?php

require_once PROJECT_ROOT_PATH . "/Model/CustomerModel.php";

class CustomerController extends BaseController
{
    public function getCustomers()
    {
        $this->apiCall('CustomerModel', 'getCustomers');
    }

    public function getTotalCustomers()
    {
        $this->apiCall('CustomerModel', 'getTotalCustomers');
    }

    public function checkNullCustomers()
    {
        $this->apiCall('CustomerModel', 'checkNullCustomers');
    }
}
