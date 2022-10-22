<?php

namespace App\Http\Controllers;

use App\Models\buyer;
use App\Rules\AgeRule;
use App\Rules\EmailRule;
use Illuminate\Http\Request;

class BuyerController extends Controller
{
    public function RegistrationSubmit(Request $request)
    {
        $this->validate(
            $request,
            [
                "first_name" => ["required", "regex:/^[a-z ,.'-]+$/i", "min:1", "max:50"],
                "last_name" => ["required", "regex:/^[a-z ,.'-]+$/i", "min:1", "max:50"],
                "dob" => ["required", "date", new AgeRule],
                "gender" => "required",
                "email" => ["required", "email", new EmailRule],
                "address" => ["required", "regex:/^[#.0-9a-zA-Z\s,-]+$/i", "min:3", "max:1000"],
                "password" => "required | min:8 | max:50",
                "photo" => "required"
            ],
            [
                "password.min" => "Password should be at least 5 character."
            ]

        );
    }
}
