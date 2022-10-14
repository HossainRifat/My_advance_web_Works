<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\All_user;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function Edit(Request $request)
    {
        return view("Admin.edit");
    }

    function User()
    {
        return view("Admin.User");
    }

    function RegSubmit(Request $request)
    {
        $this->validate(
            $request,
            [
                "First_Name" => "required | min:5",
                "email" => "email",
                "password" => "required | min:5"
            ]
        );

        $u1 = new All_user();
        $u1->email = $request->email;
        $u1->password = $request->password;
        $u1->entity = "admin";
        $u1->save();

        $admin = new admin();
        $admin->name = $request->First_Name;
        $admin->email = $request->email;
        $admin->password = $request->password;
        $admin->save();

        return redirect()->route('Login');
    }
}
