<?php

require_once PROJECT_ROOT_PATH . "/Model/EmployeeModel.php";

class EmployeeController extends BaseController
{
    public function getEmployees()
    {
        $this->apiCall('EmployeeModel', 'getEmployees');
    }

    public function getTotalEmployees()
    {
        $this->apiCall('EmployeeModel', 'getTotalEmployees');
    }

    public function checkNullEmployees()
    {
        $this->apiCall('EmployeeModel', 'checkNullEmployee');
    }
}
