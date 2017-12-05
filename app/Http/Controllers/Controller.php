<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    protected function response($data, $metadata = [])
    {
        return response(array_merge([
            'data' => $data,
        ], $metadata));
    }


    protected function presenterIs($presenter)
    {
        return request('presenter') === $presenter;
    }
}
