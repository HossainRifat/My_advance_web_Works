@extends("layouts.buyerLayout")
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> --}}

    <title>Posts</title>
</head>
<body>
    @section('content')
    <div class="posts-container">
        <div class="container d-flex justify-content-center mt-50 mb-50">
            
            <div class="row">
               <div class="col-md-10">

                @if ($all_post)
                    @foreach ($all_post as $item)
                    <div class="card card-body mt-3">
                        <div class="media align-items-center align-items-lg-start text-lg-left flex-column flex-lg-row">
                            <div class="mr-2 mb-3 mb-lg-0">
                                <img src="/storage/uploads/{{$item->photo}}" width="150" height="150" alt="">
                            </div>

                            <div class="media-body">
                                <h6 class="media-title font-weight-semibold">
                                    <a href="#" data-abc="true">{{$item->title}}</a>
                                </h6>

                                <ul class="list-inline list-inline-dotted mb-3 mb-lg-2">
                                    <li class="list-inline-item"><a href="#" class="text-muted" data-abc="true">{{$item->category}}</a></li>
                                    {{-- <li class="list-inline-item"><a href="#" class="text-muted" data-abc="true">Mobiles</a></li> --}}
                                </ul>

                                <p class="mb-3">{{$item->description}}</p>

                                <ul class="list-inline list-inline-dotted mb-0">
                                    <li class="list-inline-item">Post by <a href="#" data-abc="true">{{$item->user->first_name}} {{$item->user->last_name}}</a></li><br>
                                    <li class="list-inline-item"><a href="#" data-abc="true">{{$item->post_date}}</a></li>
                                </ul>
                            </div>

                            <div class="mt-3 mt-lg-0 ml-lg-3 text-center">
                                <?php
                                    $var = (explode(",",$item->quantity));
                                    $total_product = 0;
                                    $total_amount = 0;
                                    foreach ($var as $item2) {
                                        $var2 = explode("=",$item2);
                                        $total_product += (int)$var2[1];
                                        $total_amount = (int)$item->price * $total_product;
                                    }
                                    $total_bid = count($item->bid);
                                    echo('<h3 class="mb-0 font-weight-semibold">$'.$total_amount.'</h3>');
                                    echo('<div class="text-muted"> Product count <b>'.$total_product.'</b></div>');
                                    echo('<div class="text-muted"> Delivary '.$item->expire_date.'</div>');
                                    echo('<div class="text-muted"> Bid count '.$total_bid.'</div>');
                                ?>
                                

                                {{-- <div>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>

                                </div> --}}

                                <br>
                                <br>

                                <button type="button"><i class="icon-cart-add"></i>Details</button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    
                @endif
                            
    
    
    
                        
    
    
    
    
    
                        {{-- <div class="card card-body mt-3">
                                <div class="media align-items-center align-items-lg-start text-lg-left flex-column flex-lg-row">
                                    <div class="mr-2 mb-3 mb-lg-0">
                                        
                                            <img src="https://i.imgur.com/Aj0L4Wa.jpg" width="150" height="150" alt="">
                                       
                                    </div>
    
                                    <div class="media-body">
                                        <h6 class="media-title font-weight-semibold">
                                            <a href="#" data-abc="true">Apple iPhone XS Max (Gold, 64 GB)</a>
                                        </h6>
    
                                        <ul class="list-inline list-inline-dotted mb-3 mb-lg-2">
                                            <li class="list-inline-item"><a href="#" class="text-muted" data-abc="true">Phones</a></li>
                                            <li class="list-inline-item"><a href="#" class="text-muted" data-abc="true">Mobiles</a></li>
                                        </ul>
    
                                        <p class="mb-3">256 GB ROM | 15.49 cm (6.1 inch) Display 12MP Rear Camera | 15MP Front Camera A12 Bionic Chip Processor | Gorilla Glass with high quality display </p>
    
                                        <ul class="list-inline list-inline-dotted mb-0">
                                            <li class="list-inline-item">All items from <a href="#" data-abc="true">Mobile junction</a></li>
                                            <li class="list-inline-item">Add to <a href="#" data-abc="true">wishlist</a></li>
                                        </ul>
                                    </div>
    
                                    <div class="mt-3 mt-lg-0 ml-lg-3 text-center">
                                        <h3 class="mb-0 font-weight-semibold">$612.99</h3>
    
                                        <div>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
    
                                        </div>
    
                                        <div class="text-muted">2349 reviews</div>
    
                                        <button type="button" class="btn btn-warning mt-4 text-white"><i class="icon-cart-add mr-2"></i> Add to cart</button>
                                    </div>
                                </div>
                            </div>    
    
    
    
    
    
                            <div class="card card-body mt-3">
                                <div class="media align-items-center align-items-lg-start text-lg-left flex-column flex-lg-row">
                                    <div class="mr-2 mb-3 mb-lg-0">
                                        
                                            <img src="https://i.imgur.com/5Aqgz7o.jpg" width="150" height="150" alt="">
                                       
                                    </div>
    
                                    <div class="media-body">
                                        <h6 class="media-title font-weight-semibold">
                                            <a href="#" data-abc="true">Apple iPhone XR (Red, 128 GB)</a>
                                        </h6>
    
                                        <ul class="list-inline list-inline-dotted mb-3 mb-lg-2">
                                            <li class="list-inline-item"><a href="#" class="text-muted" data-abc="true">Phones</a></li>
                                            <li class="list-inline-item"><a href="#" class="text-muted" data-abc="true">Mobiles</a></li>
                                        </ul>
    
                                        <p class="mb-3">128 GB ROM | 15.49 cm (6.1 inch) Display 12MP Rear Camera | 7MP Front Camera A12 Bionic Chip Processor | Gorilla Glass with high quality display </p>
    
                                        <ul class="list-inline list-inline-dotted mb-0">
                                            <li class="list-inline-item">All items from <a href="#" data-abc="true">Mobile point</a></li>
                                            <li class="list-inline-item">Add to <a href="#" data-abc="true">wishlist</a></li>
                                        </ul>
                                    </div>
    
                                    <div class="mt-3 mt-lg-0 ml-lg-3 text-center">
                                        <h3 class="mb-0 font-weight-semibold">$459.99</h3>
    
                                        <div>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
    
                                        </div>
    
                                        <div class="text-muted">1985 reviews</div>
    
                                        <button type="button" class="btn btn-warning mt-4 text-white"><i class="icon-cart-add mr-2"></i> Add to cart</button>
                                    </div>
                                </div>
                            </div>
    
    
    
                             <div class="card card-body mt-3">
                                <div class="media align-items-center align-items-lg-start text-lg-left flex-column flex-lg-row">
                                    <div class="mr-2 mb-3 mb-lg-0">
                                        
                                            <img src="https://i.imgur.com/Aj0L4Wa.jpg" width="150" height="150" alt="">
                                       
                                    </div>
    
                                    <div class="media-body">
                                        <h6 class="media-title font-weight-semibold">
                                            <a href="#" data-abc="true">Apple iPhone XS Max (Gold, 64 GB)</a>
                                        </h6>
    
                                        <ul class="list-inline list-inline-dotted mb-3 mb-lg-2">
                                            <li class="list-inline-item"><a href="#" class="text-muted" data-abc="true">Phones</a></li>
                                            <li class="list-inline-item"><a href="#" class="text-muted" data-abc="true">Mobiles</a></li>
                                        </ul>
    
                                        <p class="mb-3">256 GB ROM | 15.49 cm (6.1 inch) Display 12MP Rear Camera | 15MP Front Camera A12 Bionic Chip Processor | Gorilla Glass with high quality display </p>
    
                                        <ul class="list-inline list-inline-dotted mb-0">
                                            <li class="list-inline-item">All items from <a href="#" data-abc="true">Mobile junction</a></li>
                                            <li class="list-inline-item">Add to <a href="#" data-abc="true">wishlist</a></li>
                                        </ul>
                                    </div>
    
                                    <div class="mt-3 mt-lg-0 ml-lg-3 text-center">
                                        <h3 class="mb-0 font-weight-semibold">$612.99</h3>
    
                                        <div>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
    
                                        </div>
    
                                        <div class="text-muted">2349 reviews</div>
    
                                        <button type="button" class="btn btn-warning mt-4 text-white"><i class="icon-cart-add mr-2"></i> Add to cart</button>
                                    </div>
                                </div>
                            </div>  --}}
                            
    
    
                                 
            </div>                     
            </div>
        </div>
        <div class="right-container">

            <div class="posts-hed">
                <h5 class="text-light">Short By</h5>
            </div>
            <div class="posts-short">     
            <ul>
                <li> <input class="form-check-input" type="checkbox"> <a href="" class="text-dark">Title A > Z</a></li>
                <li><input class="form-check-input" type="checkbox"><a href="" class="text-dark">Title Z > A</a></li>
                <li><input class="form-check-input" type="checkbox"><a href="" class="text-dark">Category A > Z</a></li>
                <li><input class="form-check-input" type="checkbox"> <a href="" class="text-dark">Category Z > A</a></li>
                <li><input class="form-check-input" type="checkbox"><a href="" class="text-dark">Offered price 1 > 9</a></li>
                <li><input class="form-check-input" type="checkbox"><a href="" class="text-dark">Offered price 9 > 1</a></li>
                <li><input class="form-check-input" type="checkbox"><a href="" class="text-dark">Quantity 1 > 9</a></li>
                <li><input class="form-check-input" type="checkbox"><a href="" class="text-dark">Quantity 9 > 1</a></li>
            </ul>
            </div>
            <div class="posts-hed">
                <h5 class="text-light">Filter By</h5>
            </div>
            <div class="posts-short">     
            <ul>
                <li><input class="form-check-input" type="checkbox"><a href="" class="text-dark">Price 1000 - 10,000</a></li>
                <li><input class="form-check-input" type="checkbox"><a href="" class="text-dark">Price 10,000 - 100,000</a></li>
                <li><input class="form-check-input" type="checkbox"><a href="" class="text-dark">Price 100,000+</a></li>
                <li><input class="form-check-input" type="checkbox"><a href="" class="text-dark">Quantity 100 - 500</a></li>
                <li><input class="form-check-input" type="checkbox"><a href="" class="text-dark">Quantity 500 - 1000</a></li>
                <li><input class="form-check-input" type="checkbox"><a href="" class="text-dark">Quantity 1000 - 2000</a></li>
                <li><input class="form-check-input" type="checkbox"><a href="" class="text-dark">Quantity 2000+</a></li>
            </ul>
            </div>
        </div>

    </div>
    @endsection
</body>
</html>