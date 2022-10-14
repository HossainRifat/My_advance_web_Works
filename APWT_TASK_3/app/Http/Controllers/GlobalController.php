<?php

namespace App\Http\Controllers;

use App\Models\All_user;
use App\Models\Login;
use App\Models\Uuser;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GlobalController extends Controller
{
    function Login(){
        return view("login");
    }

    function Home(){
        return view("home");
    }

    function Registration(Request $request){
        return view("registration")->with("name",$request->id);
    }

    function LoginSubmit(Request $request){
        $student = All_user::where('email',$request->email)->first(); 
        if(!empty($student)){
            if($request->pass == $student->password){
                $r = "Login Successful. ".$student->entity;

                $l1 = new Login();
                $l1->login_time = date('Y-m-d H:i:s');
                $l1->all_user_id = $student->id;
                $l1->save();

                session()->put("entity",$student->entity);
                session()->put("email",$student->email);
            }
            else{
                $r = "Incorrect Password";
            }
        }
        else{
            $r = "Incorrect Email";
        }
        return view("login")->with("output",$r);
    }
}
