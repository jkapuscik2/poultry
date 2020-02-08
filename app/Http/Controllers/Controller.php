<?php

namespace App\Http\Controllers;

use App\Poultry;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    private $poultryModel;

    public function __construct(Poultry $poultry)
    {
        $this->poultryModel = $poultry;
    }

    public function index()
    {
        $models = $this->poultryModel->getAll();

        return View("index",
            [
                "models" => $models,
                "instanceId" => $this->getInstanceId(),
                "requestId" => $this->getRequestId()
            ]);
    }

    private function getInstanceId(): string
    {
        try {
            return file_get_contents('http://169.254.169.254/latest/meta-data/instance-id');
        } catch (\ErrorException $exception) {
            return "local";
        }
    }

    private function getRequestId(): string
    {
        return password_hash(str_repeat(uniqid(), 1000), PASSWORD_BCRYPT);
    }

}
