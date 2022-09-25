<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pageController extends Controller
{
    function Hello(){
        return view('hello');
    }

    function About(){
        return view('about_us');
    }

    function Products(){
        return view('products');
    }

    function Add_product(){
        return view('add_product');
    }
}
