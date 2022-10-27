<?php

namespace App\Http\Controllers;

use App\Models\all_user;
use App\Models\login;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function Login()
    {

        return view('login');
    }

    public function LoginSubmit(Request $request)
    {
        $user = all_user::where('email', $request->email)->first();
        if (!empty($user)) {

            if ($request->password == $user->password) {
                $r = "Login Successful. " . $user->entity;

                $date = date('h:i:s a m/d/Y');

                $token = Str::random(32);
                $l1 = new login();
                $l1->login_time = date('h:i:s a m/d/Y', strtotime($date));
                $l1->all_users_id = $user->id;
                $l1->token = $token;
                $l1->save();

                $r = "Login Successful. " . $user->entity . $token;
                // session()->put("entity", $user->entity);
                // session()->put("email", $user->email);
                // session()->put("token", $token);

                // if ($user->entity == "user") {
                //     return redirect()->route('Dashboard');
                // } else {
                //     return redirect()->route('Userlist');
                // }
            } else {
                $r = "Incorrect Password";
            }
        } else {
            $r = "Incorrect Email";
        }
        return view("login")->with("output", $r);
    }
}
