<?php

require_once PROJECT_ROOT_PATH . "/Model/OfficeModel.php";

class OfficeController extends BaseController
{
    public function getOffices()
    {
        $this->apiCall('OfficeModel', 'getOffices');
    }

    public function getTotalOffices()
    {
        $this->apiCall('OfficeModel', 'getTotalOffices');
    }

    public function checkOfficeByCountryOffices()
    {
        $this->apiCall('OfficeModel', 'checkOfficeByCountry');
    }
}
