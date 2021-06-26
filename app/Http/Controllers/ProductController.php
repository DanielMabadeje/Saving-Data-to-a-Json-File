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


    public function addProduct()
    {
        # code...
    }
}
