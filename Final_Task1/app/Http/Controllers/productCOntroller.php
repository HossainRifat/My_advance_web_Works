<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class productCOntroller extends Controller
{
    public function AllProduct(){
        return product::all();
    }

    public function AddProduct(Request $req){
        $product = new product();
        $product->name = $req->name;
        $product->price = $req->price;
        $product->amount = $req->amount;
        $product->save();

        return $req;
    }
}
