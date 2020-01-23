<?php

namespace App\Http\Controllers;

use App\Poultry;
use Illuminate\Support\Facades\Storage;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function index()
    {
        $models = Poultry::all();

        return View("index",
            [
                "models" => $models,
                "instanceId" => $this->getInstanceId()
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
}
