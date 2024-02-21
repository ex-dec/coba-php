<?php

require_once PROJECT_ROOT_PATH . "/Model/PaymentModel.php";

class PaymentController extends BaseController
{
    public function getPayments()
    {
        $this->apiCall('PaymentModel', 'getPayments');
    }

    public function getTotalAmountPayments()
    {
        $this->apiCall('PaymentModel', 'getTotalAmount');
    }

    public function getAmountPaidPayments()
    {
        $this->apiCall('PaymentModel', 'getAmountPaid');
    }

    public function getTotalAmountByYearPayments()
    {
        $this->apiCall('PaymentModel', 'getTotalAmountByYear');
    }

    public function getTotalAmountByYearAndMonthPayments()
    {
        $this->apiCall('PaymentModel', 'getTotalAmountByYearAndMonth');
    }
}
