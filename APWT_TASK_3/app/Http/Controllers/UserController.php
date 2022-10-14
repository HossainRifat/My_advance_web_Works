<?php

namespace App\Http\Controllers;

use App\Models\All_user;
use App\Models\Uuser;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function Dash()
    {
        return view("user.dash");
    }

    function Edit()
    {
        return view("User.edit");
    }

    function Profile()
    {
        return view("User.profile");
    }

    function RegSubmit(Request $request)
    {
        $this->validate(
            $request,
            [
                "First_Name" => "required | min:5",
                "age" => "required",
                "gender" => "required",
                "email" => "email",
                "address" => "required | min:3",
                "password" => "required | min:5"
            ]
        );

        $u1 = new All_user();
        $u1->email = $request->email;
        $u1->password = $request->password;
        $u1->entity = "user";
        $u1->save();

        $student = new Uuser();
        $student->name = $request->First_Name;
        $student->email = $request->email;
        $student->address = $request->address;
        $student->gender = $request->gender;
        $student->dob = $request->age;
        $student->password = $request->password;
        $student->save();

        return redirect()->route('Login');
    }
}
