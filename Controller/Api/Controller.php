<?php

require_once PROJECT_ROOT_PATH . "/Model/ApiModel.php";

class Controller extends BaseController
{
    public function api($id)
    {
        $this->apiCall('ApiModel', $id);
    }
}
