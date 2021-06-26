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
        $this->jsonData=json_decode($this->jsonData);
    }


    public function addProduct(Request $request)
    {
        
        $this->jsonData->products=$request->product;

        // Write File

        $newJsonString = json_encode($this->jsonData, JSON_PRETTY_PRINT);

        file_put_contents(base_path('resources/lang/en/db.json'), stripslashes($newJsonString));

        return $this->success("Added Successfully");

    }

    public function success($message)
    {
        http_response_code(200);
        return json_encode([
            "code"=>200,
            "message"=>$message
        ]);
    }
}
