<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController2 extends Controller
{
    public function index(){
        return view("product2.index");
    }
}
