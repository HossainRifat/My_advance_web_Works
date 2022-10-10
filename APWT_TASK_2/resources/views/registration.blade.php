@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <title>Document</title>
</head>
<body>
    @section('content')
    <div class="reg">
        <div class="reg-content">
            <div class="left-content">
                <div class="reg-img">
                    <img src="/img/reg.png" alt="">
                </div>
            </div>
            <div class="right-content">
                <h2>Registration</h2>
                <h4>Just a Step way to become our Member!</h4>
                <div class="reg-border">
                    <form  method="post" action="{{route('/reg')}}">
                        {{ csrf_field() }}
                        <label>Name</label><br>
                        <input type="text" placeholder="Enter your name" name="First_Name" value="{{old('First_Name')}}">
                        @if ($errors->has('First_Name'))
                            <span>
                                <p>{{$errors->first("First_Name")}}</p>
                            </span>
                        @endif
                        <label>Email</label>
                        <input type="Email" placeholder="Enter your email" name="email">
                        @if ($errors->has('email'))
                            <span>
                                <p>{{$errors->first("email")}}</p>
                            </span>
                        @endif
                        <label>Gender</label>
                        <input type="text" placeholder="Enter your gender" name="gender">
                        @if ($errors->has('gender'))
                            <span>
                                <p>{{$errors->first("gender")}}</p>
                            </span>
                        @endif
                        <label>Age</label>
                        <input type="text" placeholder="Enter your age" name="age">
                        @if ($errors->has('age'))
                            <span>
                                <p>{{$errors->first("age")}}</p>
                            </span>
                        @endif
                        <label>Address</label>
                        <textarea name="address" rows="3" placeholder="Enter address"></textarea>
                        @if ($errors->has('address'))
                            <span>
                                <p>{{$errors->first("address")}}</p>
                            </span>
                        @endif
                        <input type="submit" name="submit" value="Signup">
                    </form>
                </div>
            </div>
            
        </div>
        <div class="errors">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>  
    </div>
    
    
</body>
</html>