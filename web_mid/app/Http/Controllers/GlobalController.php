<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GlobalController extends Controller
{
    public function Home()
    {
        return view('home');
    }

    public function Registration(Request $request)
    {

        return view('registration')->with("name", $request->id);
    }
}
