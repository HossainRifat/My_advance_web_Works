<?php

namespace App\Http\Controllers;

use App\Models\buyerss;
use Illuminate\Http\Request;

class BuyerController extends Controller
{
    function Reg()
    {
        return view("reg");
    }
}
