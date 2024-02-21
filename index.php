<?php

require __DIR__ . "/inc/bootstrap.php";

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', $uri);

if ((isset($uri[2]) && $uri[2] == 'customer')) {
    require PROJECT_ROOT_PATH . "/Controller/Api/CustomerController.php";
    $objFeedController = new CustomerController();
    $strMethodName = $uri[3] . "Customers";
    $objFeedController->{$strMethodName}();
} elseif ((isset($uri[2]) && $uri[2] == 'employee')) {
    require PROJECT_ROOT_PATH . "/Controller/Api/EmployeeController.php";
    $objFeedController = new EmployeeController();
    $strMethodName = $uri[3] . "Employees";
    $objFeedController->{$strMethodName}();
} elseif ((isset($uri[2]) && $uri[2] == 'office')) {
    require PROJECT_ROOT_PATH . "/Controller/Api/OfficeController.php";
    $objFeedController = new OfficeController();
    $strMethodName = $uri[3] . "Offices";
    $objFeedController->{$strMethodName}();
} elseif ((isset($uri[2]) && $uri[2] == 'orderdetail')) {
    require PROJECT_ROOT_PATH . "/Controller/Api/OrderDetailController.php";
    $objFeedController = new OrderDetailController();
    $strMethodName = $uri[3] . "OrderDetails";
    $objFeedController->{$strMethodName}();
} elseif ((isset($uri[2]) && $uri[2] == 'order')) {
    require PROJECT_ROOT_PATH . "/Controller/Api/OrderController.php";
    $objFeedController = new OrderController();
    $strMethodName = $uri[3] . "Orders";
    $objFeedController->{$strMethodName}();
} elseif ((isset($uri[2]) && $uri[2] == 'payment')) {
    require PROJECT_ROOT_PATH . "/Controller/Api/PaymentController.php";
    $objFeedController = new PaymentController();
    $strMethodName = $uri[3] . "Payments";
    $objFeedController->{$strMethodName}();
} elseif ((isset($uri[2]) && $uri[2] == 'product')) {
    require PROJECT_ROOT_PATH . "/Controller/Api/ProductController.php";
    $objFeedController = new ProductController();
    $strMethodName = $uri[3] . "Products";
    $objFeedController->{$strMethodName}();
} elseif ((isset($uri[2]) && $uri[2] == 'productline')) {
    require PROJECT_ROOT_PATH . "/Controller/Api/ProductLineController.php";
    $objFeedController = new ProductLineController();
    $strMethodName = $uri[3] . "ProductLines";
    $objFeedController->{$strMethodName}();
} elseif ((isset($uri[2]) && $uri[2] == 'query')) {
    require PROJECT_ROOT_PATH . "/Controller/Api/QueryController.php";
    $objFeedController = new QueryController();
    $strMethodName = $uri[3];
    $objFeedController->{$strMethodName}();
} elseif ((isset($uri[2]) && $uri[2] == 'api')) {
    require PROJECT_ROOT_PATH . "/Controller/Api/Controller.php";
    $objFeedController = new Controller();
    $strMethodName = $uri[3];
    $objFeedController->api($strMethodName);
} else {
    header("HTTP/1.1 404 Not Found");
    exit();
}
