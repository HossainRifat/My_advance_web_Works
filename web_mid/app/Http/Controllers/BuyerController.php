<?php

namespace App\Http\Controllers;

use App\Models\all_user;
use App\Models\buyer;
use App\Models\login;
use App\Rules\AgeRule;
use App\Rules\EmailRule;
use App\Rules\FileSaveRule;
use App\Rules\PhoneRule;
use Faker\Core\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
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
                "design" => ["required", "mimes:jpg,png,jpeg"]
            ],
            [
                "password.min" => "Password should be at least 8 character.",
                "photo.mines" => "Only jpg, jpeg, png files are allowed."
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
                $data = [
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'dob' => $request->dob,
                    'gender' => $request->gender,
                    'email' => $request->email,
                    'address' => $request->address,
                    'password' => $request->password,
                    'photo' => $filename,
                ];
                $jsonData = json_encode($data);
                session()->put("reg1", $jsonData);
                session()->put("email", $request->email);
                //dd(session()->get("reg1"));

                return redirect()->route('Registration02');
            } else {
                return redirect()->route('Registration');
            }
        }
    }

    public function Registration02()
    {
        return view('buyer.registration02');
    }

    public function Registration02Submit(Request $request)
    {
        $this->validate(
            $request,
            [
                "nid" => ["required", "max:50"],
                "passport" => ["max:50"],
                "phone" => ["required", "max:50", new PhoneRule],
                "account" => ["required", "mimes:pdf"],
                "documents" => ["mimes:pdf"],

            ],
            [
                "account.mines" => "Only pdf files are allowed.",
                "documents.mines" => "Only pdf files are allowed."
            ]

        );

        if ($request->account) {
            $filename = date("d-m-Y_H-i-s") . '_account_' . session()->get('email') . '.' . $request->account->extension();
            //$filepath = $request->file('file')->storeAs('uploads', $filename, 'public');
            $filePath = $request->file('account')->storeAs('uploads', $filename, 'public');
            //dd($filename);
            //$filePath = Storage::putFileAs("uploads", $request->file("photo"), , "public");
            //dd($filePath);
            $filePath2 = NULL;
            if ($request->documents) {
                $filename2 = date("d-m-Y_H-i-s") . '_documents_' . session()->get('email') . '.' . $request->documents->extension();
                $filePath2 = $request->file('documents')->storeAs('uploads', $filename2, 'public');
            }
            if ($filePath) {
                if ($filePath2) {

                    if ($request->passport) {
                        $data = [
                            'nid' => $request->nid,
                            'passport' => $request->passport,
                            'phone' => $request->phone,
                            'account' => $filename,
                            'documents' => $filePath2,
                        ];
                    } else {
                        $data = [
                            'nid' => $request->nid,
                            'phone' => $request->phone,
                            'account' => $filename,
                            'documents' => $filePath2,
                            'passport' => "NULL",
                        ];
                    }
                } else {
                    if ($request->passport) {
                        $data = [
                            'nid' => $request->nid,
                            'passport' => $request->passport,
                            'phone' => $request->phone,
                            'account' => $filename,
                            'documents' => "NULL",
                        ];
                    } else {
                        $data = [
                            'nid' => $request->nid,
                            'phone' => $request->phone,
                            'account' => $filename,
                            'documents' => "NULL",
                            'passport' => "NULL",
                        ];
                    };
                }

                $jsonData = json_encode($data);
                //dd($jsonData);
                session()->put("reg2", $jsonData);

                //dd(session()->get('reg2'), session()->get('reg1'));

                return redirect()->route('Registration03');
            } else {
                return redirect()->route('Registration02');
            }
        }
    }

    public function Registration03()
    {
        return view('buyer.registration03');
    }

    public function Registration03Submit(Request $request)
    {
        $this->validate(
            $request,
            [
                "password" => ["required", "max:50", "min:8"],
                "password_confirmation" => ["required", "min:8", "max:50", "same:password"],

            ],
            [
                "password.min" => "Password must be at least 8 character.",
                "password_confirmation.min" => "Password must be at least 8 character.",
                "password_confirmation.same" => "Password did not match."
            ]

        );

        $jsondata = session()->get('reg1');
        $data = json_decode($jsondata);

        $jsondata2 = session()->get('reg2');
        $data2 = json_decode($jsondata2);

        $buyer = new buyer();
        $buyer->first_name = $data->first_name;
        $buyer->last_name = $data->last_name;
        $buyer->dob = $data->dob;
        $buyer->gender = $data->gender;
        $buyer->email = $data->email;
        $buyer->address = $data->address;
        $buyer->password = $request->password;
        $buyer->photo = $data->photo;

        $buyer->nid = $data2->nid;
        $buyer->passport = $data2->passport;
        $buyer->phone = $data2->phone;
        $buyer->account = $data2->account;
        $buyer->documents = $data2->documents;
        $buyer->status = "invalid";

        $buyer->save();

        $user = new all_user();
        $user->email = $data->email;
        $user->password = $request->password;
        $user->entity = "buyer";
        $user->save();

        return redirect()->route("Home");
    }

    public function BuyerDashboard()
    {
        if (session()->has("email")) {
            $user = buyer::where('email', session()->get("email"))->first();
            if ($user) {
                $checkout = 0;
                $money = 0;
                $active_order = 0;
                if ($user->my_order) {
                    foreach ($user->my_order as $item) {
                        $checkout += count($item->my_checkout);
                        $money += (int)$item->price;
                        if ($item->status != "done") {
                            $active_order += 1;
                        }
                    }
                }
                return view("buyer.Dashboard")->with("user", $user)->with("post", count($user->my_post))->with("order", count($user->my_order))->with("checkout", $checkout)->with("money", $money)->with("active_order", $active_order)->with("my_post", $user->my_post);
            } else {
                return redirect()->route("Login");
            }
        } else {
            return redirect()->route("Login");
        }
    }

    public function Logout()
    {

        $user = login::where('token', session()->get("token"))->first();
        if ($user) {
            $user->logout_time = date('h:i:s A m/d/Y', strtotime(date('h:i:s A m/d/Y')));
            $user->save();
        }

        session()->forget("token");
        session()->forget("email");
        session()->forget("entity");
        session()->forget("id");
        Cookie::queue(Cookie::forget("token"));

        return redirect()->route("Login");
    }

    public function Profile(Request $request)
    {
        if (session()->has("email")) {
            $user = buyer::where('email', session()->get("email"))->first();
            return view("buyer.profile")->with("user", $user)->with("data", $request->id);
        } else {
            return redirect()->route("Login");
        }
    }

    public function ProfileSubmit(Request $data)
    {

        //dd($data);
        $this->validate(
            $data,
            [
                "first_name" => ["required", "regex:/^[a-z ,.'-]+$/i", "min:1", "max:50"],
                "last_name" => ["required", "regex:/^[a-z ,.'-]+$/i", "min:1", "max:50"],
                "dob" => ["required", "date", new AgeRule],

                "email" => ["required", "email"],
                "address" => ["required", "regex:/^[#.0-9a-zA-Z\s,-]+$/i", "min:3", "max:1000"],
                "nid" => ["required", "max:50"],
                "passport" => ["max:50"],
                "phone" => ["required", "max:50"],

            ]
        );
        $buyer = buyer::where('email', session()->get("email"))->first();
        if ($buyer) {
            $buyer->first_name = $data->first_name;
            $buyer->last_name = $data->last_name;
            $buyer->dob = $data->dob;
            $buyer->email = $data->email;
            $buyer->address = $data->address;
            $buyer->nid = $data->nid;
            $buyer->passport = $data->passport;
            $buyer->phone = $data->phone;
            $buyer->save();
            return redirect()->route("Profile", "get");
        }
    }
}
