<?php

require_once PROJECT_ROOT_PATH . "/Model/ProductModel.php";

class ProductController extends BaseController
{
    public function getProducts()
    {
        $this->apiCall('ProductModel', 'getProducts');
    }

    public function getTotalProducts()
    {
        $this->apiCall('ProductModel', 'getTotalProducts');
    }

    public function getProductByProductLineProducts()
    {
        $this->apiCall('ProductModel', 'getProductByProductLine');
    }

    public function getQtyInStockProducts()
    {
        $this->apiCall('ProductModel', 'getQtyInStock');
    }
}
