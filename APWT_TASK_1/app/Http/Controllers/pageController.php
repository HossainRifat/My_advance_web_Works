<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Product{
    var $name;
    var $size;

    function __construct($name, $size)
    {
        $this->name=$name;
        $this->size=$size;
    }
}


class pageController extends Controller
{
    function Hello(){
        return view('hello');
    }

    function About(){
        return view('about_us');
    }

    function Products(){
        $p1 = new Product("car","large");
        $p2 = new Product("juce","small");
        $p3 = new Product("water bottle","small");
        $productList=array($p1,$p2,$p3);
        return view('products')->with("productList",$productList);
    }

    function Add_product(){
        return view('add_product');
    }

    function Contact(){
        return view('contact');
    }

    function showProduct(Request $rq){
        $output = "submitted";
        $output.="<br>Product Name:" .$rq->ProductName;
        $output.="<br>Product size:" .$rq->ProductSize;
        return $output;
    }
}
