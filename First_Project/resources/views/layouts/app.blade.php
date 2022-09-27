<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title></title>
</head>
<body>
    <!-- <div>
        <a href="{{url('/home')}}">Home</a>
        <a href="{{url('/about')}}">About Us</a>
        <a href="{{url('/products')}}">Products</a>
        <a href="{{url('/add')}}">Add Product</a>
    </div> -->
    @include('inc.topnav')
    <div>
        @yield('content')
    </div>
    <div>
        <hr>
        All right preserved to this page.
    </div>
</body>
</html>