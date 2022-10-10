<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class User{
    var $name;
    var $age;
    var $gender;
    var $email;
    var $address;

    function __construct($name, $age, $gender, $email, $address)
    {
        $this->name=$name;
        $this->age=$age;
        $this->gender=$gender;
        $this->email=$email;
        $this->address=$address;
    }
}

class pagesController extends Controller
{
    

    function Login(){
        return view("login");
    }

    function Registration(){
        return view("registration");
    }

    function LoginSubmit(Request $request){
        $r = "";
        if($request->email == "rh140025@gmail.com"){
            if($request->pass == "abcd"){
                $r = "Login Successful";
            }
            else{
                $r = "Incorrect pass";
            }
        }
        else{
            $r = "incorrect username/email";
        }
        return view('login')->with("output",$r);
    }

    function RegSubmit(Request $request){
        $this->validate($request,[
            "First_Name"=>"required",
            "age"=>"required",
            "gender"=>"required",
            "email"=>"email",
            "address"=>"required"
        ]
    );

    $u1 = new User($request->First_Name,$request->age,$request->gender,$request->email,$request->address);
    // $u1->name = $request->First_Name;
    // $u1->age = $request->age;
    // $u1->gender = $request->gender;
    // $u1->email = $request->email;
    // $u1->address = $request->address
    return view('/regshow')->with('user',$u1);
        
    }

    function Contact(){
        return view("contact");
    }
}
