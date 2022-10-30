<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Rules\quantiRule;
use App\Rules\quantiRule2;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function Post()
    {
        return view("buyer.post");
    }

    public function PostSubmit(Request $request)
    {
        // dd("m = " . $request->m . ", l = " . $request->l . ", xl = " . $request->xl . ", xxl = " . $request->xxl . ", xxxl = " . $request->xxxl);
        session()->put("m", $request->m);
        session()->put("l", $request->l);
        session()->put("xl", $request->xl);
        session()->put("xxl", $request->xxl);
        session()->put("xxxl", $request->xxxl);
        $this->validate(
            $request,
            [
                "title" => ["required", "regex:/^[a-z ,.'-]+$/i", "min:10", "max:100"],
                "category" => ["required"],
                "expire_date" => ["required", "date"],
                "price" => ["required", "numeric"],
                "m" => ["required", "numeric", new quantiRule],
                "l" => ["required", "numeric", new quantiRule],
                "xl" => ["required", "numeric", new quantiRule],
                "xxl" => ["required", "numeric", new quantiRule],
                "xxxl" => ["required", "numeric", new quantiRule, new quantiRule2],
                "description" => ["required", "min:5", "max:1000"],
                "design" => ["required", "mimes:jpg,png,jpeg"]
            ],
            [
                // "m.min", "xl.min", "xxl.min", "xxl.min", "l.min" => "You have to order at least 20 per size or you can put 0 if you don't want any particular size.",
                // "l.min" => "You have to order at least 20.",
                // "xl.min" => "You have to order at least 20.",
                // "xxl.min" => "You have to order at least 20.",
                // "xxl.min" => "You have to order at least 20.",
                "design.mines" => "Only jpg, jpeg, png files are allowed."
            ]

        );

        if ($request->design) {
            $filename = date("d-m-Y_H-i-s") . '_profile_' . session()->get('email') . '.' . $request->design->extension();
            $filePath = $request->file('design')->storeAs('uploads', $filename, 'public');


            if ($filePath) {
                $quantity2 = "m = " . $request->m . ", l = " . $request->l . ", xl = " . $request->xl . ", xxl = " . $request->xxl . ", xxxl = " . $request->xxxl;
                $post = new post();
                $post->title = $request->title;
                $post->description = $request->description;
                $post->category = $request->category;
                $post->quantity = $quantity2;
                $post->price = $request->price;
                $post->buyer_id = session()->get('id');
                $post->photo = $filename;
                $post->expire_date = $request->expire_date;
                $post->post_date = date('h:i:s A m/d/Y', strtotime(date('h:i:s a m/d/Y')));
                $post->status = "post";
                $post->save();

                dd("posted");
                return redirect()->route('Post');
            }
            return redirect()->route('Post');
        }
    }
}
