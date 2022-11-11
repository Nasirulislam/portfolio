<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Validator;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function validateInput($request, $rules)
    {
        $data = !is_array($request) ? $request->input() : $request;
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            http_response_code(422);
            header('Content-Type: application/json; charset=utf-8');
            die(json_encode(['message' => $validator->errors()->first()]));
        }
    }


    protected function uploadFile($file, $path = 'uploads')
    {
        $name = rand(999, 9999) . time() . rand(1, 9) . "." . $file->getClientOriginalExtension();
        $file = $file->move(public_path($path), $name);
        return substr($path, -1) == '/' ? $path : "$path/" . $name;
    }
}
