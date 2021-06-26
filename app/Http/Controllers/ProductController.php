<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{


    public $jsonData;
    public function __construct()
    {
        $jsonString = file_get_contents(base_path('resources/lang/en/db.json'));

        $this->jsonData=$jsonString;
    }


    public function addProduct(Request $request)
    {
        dd($request::all());

        $this->jsonData->products=$request::all();

        return $this->success("Added Successfully");

    }

    public function success($message)
    {
        return json_encode([
            "message"=>$message
        ])
    }
}
