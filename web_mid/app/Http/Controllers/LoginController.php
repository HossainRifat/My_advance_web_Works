<?php

namespace App\Http\Controllers;

use App\Models\all_user;
use App\Models\login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function Login()
    {
        if (Cookie::has('token')) {
            $value = Cookie::get('token');
            $instance = login::where('token', $value)->first();
            if (!empty($instance)) {
                $r = "Already logged in. " . $instance->user->email;
            } else {
                $r = "Not logged in.";
            }
        } else {
            $r = "Not logged in.";
        }

        // $user = all_user::where('email', "rh140035@gmail.com")->first();
        // dd($user->logged_session);
        return view('login')->with("output", $r);
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

                session()->put("entity", $user->entity);
                session()->put("email", $user->email);
                session()->put("token", $token);

                //Set cookie: Cookie::queue(Cookie::make('cookieName', 'value', $minutes));
                // Get cookie: $value = $request->cookie('cookieName'); or $value = Cookie::get('cookieName');
                // Forget/remove cookie: Cookie::queue(Cookie::forget('cookieName'));
                // Check if cookie exist: Cookie::has('cookiename'); or $request->hasCookie('cookiename') will return true or false

                if ($request->has("logedin")) {
                    $lifetime = time() + 60 * 60 * 24 * 365; // one year
                    Cookie::queue(Cookie::make('token', $token, $lifetime));
                }
                //session()->put("token", $token);

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
