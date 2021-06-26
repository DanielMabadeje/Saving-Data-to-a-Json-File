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
    function date_compare($element1, $element2) {
        $datetime1 = strtotime($element1['datetime']);
        $datetime2 = strtotime($element2['datetime']);
        return $datetime1 - $datetime2;
    } 

    public function getProduct()
    {

        // $jsonString = file_get_contents(base_path('resources/lang/en/db.json'));
        // $data=$jsonString;
        $data = $this->jsonData;
    

        // usort($data->products, 'date_compare');
        usort($data->products, function ($element1, $element2) {
            $datetime1 = strtotime($element1->datetime);
            $datetime2 = strtotime($element2->datetime);
            return $datetime2 - $datetime1;
        } );

        return view('index', compact('data'));
    }

    public function success($message)
    {
        http_response_code(200);
        return json_encode([
            "code"=>200,
            "status"=>"success",
            "message"=>$message
        ]);
    }

  
      
}
