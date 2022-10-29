@extends('layouts.buyerLayout')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post</title>
</head>
<body>
    @section('content')
        

    

    <div class="container-main">
        <div class="post-background-image"></div>
        <div class="post-container shadow-sm text-dark">
            <div class="top-text">
                <h2>RMG Solution</h2>
                <h3>Tell us what you need done</h3>
                <h6>Contact skilled freelancers within minutes. View profiles, ratings, portfolios and chat with them. Pay the freelancer only when you are 100% satisfied with their work.</h6>
            </div>
            <div class="form-conatiner">
                <form  method="post" action="/registration/buyer" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <label>Choose a name for your project</label><br>
                    <input type="text" placeholder="Project title" name="title" value="{{old('title')}}">
                    @if ($errors->has('title'))
                        <span>
                            <p>{{$errors->first("title")}}</p>
                        </span>
                    @endif
                    <label>Choose catagory</label>
                    <select name="catagory">
                        <option value="" disabled selected>Choose your product catagory</option>
                        <option value="T-shirt">T-shirt</option>
                        <option value="Casual Shirt">Casual Shirt</option>
                        <option value="Jursey">Jursey</option>
                        <option value="Formal Shirt">Formal Shirt</option>
                        <option value="Sweater">Sweater</option>
                        <option value="Jacket">Jacket</option>
                        <option value="Coat">Coat</option>
                        <option value="Jeans">Jeans</option>
                        <option value="Shocks">Shocks</option>
                        <option value="Shorts">Shorts</option>
                        <option value="Tracksuit">Tracksuit</option>
                        <option value="Vest">Vest</option>
                        <option value="Pajamas">Pajamas</option>
                        <option value="Suit">Suit</option>
                        <option value="Raincoat">Raincoat</option>
                        <option value="Ladies Dress">Ladies Dress</option>
                      </select>
                      

                    <label>Tell us more about your project</label>
                    <textarea name="description" rows="5" placeholder="Describe your product including color codes, fabrics and design here..">{{old('description')}}</textarea>
                    @if ($errors->has('description'))
                        <span>
                            <p>{{$errors->first("description")}}</p>
                        </span>
                    @endif
                    <label>Upload your design</label>
                    <input type="file" placeholder="Enter your profile picture" class="form-control form-control-lg" id="formFile" name="design" value="{{old('design')}}">
                    @if ($errors->has('design'))
                        <span>
                            <p>{{$errors->first("design")}}</p>
                        </span>
                    @endif

                    <label>Quantity</label><br>
                    <input type="text" placeholder="Quantity of product in number" name="quantity" value="{{old('quantity')}}">
                    @if ($errors->has('quantity'))
                        <span>
                            <p>{{$errors->first("quantity")}}</p>
                        </span>
                    @endif
                    <label>Price per unit</label>
                    <input type="text" placeholder="Price per unit you want to offer in number" name="email" value="{{old('email')}}">
                    @if ($errors->has('email'))
                        <span>
                            <p>{{$errors->first("email")}}</p>
                        </span>
                    @endif
                    
                    <label>Provide deadline for delivary</label>
                    <input type="date" placeholder="" name="expire_date" value="{{old('expire_date')}}">
                    @if ($errors->has('expire_date'))
                        <span>
                            <p>{{$errors->first("expire_date")}}</p>
                        </span>
                    @endif
                    
                    
                    <input type="submit" name="submit" value="Next">
                </form>
            </div>
        </div>
    </div>

    @endsection
</body>
</html>