@extends('guest.layout')
@section('content')
<!-- First Slider -->
<div class="container-fluid p-0">
            <div class="site-slider">
                <div class="slider-one">
                    @foreach($promotions as $promotion)
                    <div>
                        <img src="{{asset('images/promotion/'.$promotion->image)}}" class="img-fluid" alt="Cosmetics Banner" width="100%"
                            height="300px" />
                    </div> 
                    @endforeach                  
                </div>
                <div class="slider-btn">
                    <span class="prev position-top"><i class="fa fa-chevron-left" aria-hidden="true"></i></span>
                    <span class="next position-top right-0"><i class="fa fa-chevron-right"
                            aria-hidden="true"></i></span>
                </div>
            </div>
        </div>
        <!-- First Slider -->

        <!-- Second Slider -->
        <div class="container-fluid">
            <div class="site-slider-two px-md-4">
                <div class="row slider-two text-center">
                    @foreach($categories as $category)
                        @if($category->status == 'active')
                            <div class="col-md-3 product pt-md-5 pt-4">
                                <a href="hair.html"><img src="{{asset('images/category/'.$category->image)}}" /></a>
                                <span class="border site-btn btn-span">{{$category->name}}</span>
                            </div>
                        @endif   
                    @endforeach                                            
                </div>
                <div class="slider-btn">
                    <span class="prev position-top"><i class="fa fa-caret-left fa-2x text-secondary"></i></span>
                    <span class="next position-top right-0"><i
                            class="fa fa-caret-right fa-2x text-secondary"></i></span>
                </div>
            </div>
        </div>
        <!-- Second Slider -->

        <div class="container-fluid mb-3">
            <div class="row text-center">
                <h1>NEW PRODUCT</h1>
            </div>
            <div class="row">
                @foreach($products as $product)
                    
                        <div class="col-3">
                            <div class="card text-center">
                                <img src="{{asset('images/product/'.$product->category->name.'/'.$product->image)}}" class="card-img-top">
                                <h5 class="card-header bg-primary-color primary-color pacifico text-capitalize">{{$product->name}}</h5>
                                <div class="card-body">
                                    <p class="card-text primary-color"><b>Price: {{$product->price}} VND</b></p>
                                    <a href="{{route('product_detail', $product->id)}}" class="btn btn-primary">View Detail</a>
                                </div>
                            </div>
                        </div>
                    
                @endforeach
            </div>
        </div>

@endsection