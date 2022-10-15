@extends("layouts.app")
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact</title>
</head>
<body>
    @section('content')
    
    <div class="background-img"></div>


     <div class="reg">
        <div class="reg-content">
            {{-- <div class="left-content">
                <div class="reg-img-contact">
                    <img src="/img/contact.png" alt="">
                </div>
            </div> --}}
            <div class="right-content">
                <h2>Contact With Us</h2>
                <h4>Let us know your Query. We will get to you in 24hrs!</h4>
                <div class="reg-border">
                    <form  method="post" action="/contact">
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
                        
                        <label>Message</label>
                        <textarea name="message" rows="3" placeholder="Enter address"></textarea>
                        @if ($errors->has('message'))
                            <span>
                                <p>{{$errors->first("message")}}</p>
                            </span>
                        @endif
                        
                            <input type="submit" name="submit" value="Send" class="fas fa-send">
                        
                        
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

    @endsection
</body>
</html>