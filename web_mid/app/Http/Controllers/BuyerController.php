<?php

namespace App\Http\Controllers;

use App\Models\buyer;
use App\Rules\AgeRule;
use App\Rules\EmailRule;
use App\Rules\FileSaveRule;
use Faker\Core\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
                "photo" => ["required", "mimes:jpg,png,jpge", new FileSaveRule]
            ],
            [
                "password.min" => "Password should be at least 5 character."
            ]

        );

        if ($request->photo) {
            $filename = date("d-m-Y_H-i-s") . '_profile_' . $request->email . '.' . $request->photo->extension();
            //$filepath = $request->file('file')->storeAs('uploads', $filename, 'public');
            $filePath = $request->file('photo')->storeAs('uploads', $filename, 'public');
            //dd($filename);
            //$filePath = Storage::putFileAs("uploads", $request->file("photo"), , "public");
            //dd($filePath);
            if ($filePath) {
            }
        }
    }
}
