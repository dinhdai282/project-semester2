@extends('guest.layout')

@section('content')

<section>
	<div class="container">
        <div class="row mb-3" style="border-bottom: 1px solid black;">
        <div class="col-sm-9">
        </div>
        <div class="col-sm-3">
        <form class="form-inline my-2 my-lg-0">
                <button class="btn btn-outline-success mr-sm-2" type="submit"><i class="fa fa-search"></i></button>
                <input class="form-control my-2 my-sm-0" type="search" placeholder="Please input something..."
                    aria-label="Search" id="search-bar">
            </form>
        </div>
        </div>
		<div class="row">
			<div class="col-sm-3" style="border-right: 1px solid black;">
				<div class="left-sidebar">
										
					<div class="brands_products"><!--brands_products-->
						<h2>Brands</h2>
                        @php
                        use App\Models\Brand;

                        $brands = Brand::all();
                        @endphp
						<div class="brands-name">
                            <div class="row">
                                @foreach($brands as $brand)
								<div class="col-4 text-center" style="border: 1px solid black;">     
                                <a href="{{route('brand_filter', $brand->id)}}"> <span class="pull-right">{{$brand->name}}</span></a></li>
								</div> 
                                @endforeach        
							</div>
						</div>
					</div><!--/brands_products-->
						
					<div class="price-range"><!--price-range-->
						<h2>Price Range</h2>
						<div class="well text-center">
							<input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
							<b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
						</div>
					</div><!--/price-range-->				
					
				</div>
			</div>

			<div class="col-sm-9 padding-right">	
                    <div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
                        <div class="row">
                        @foreach($products as $product)
						<div class="col-sm-4 data">
                            <a href="{{route('product_detail', $product->id)}}">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{asset('images/product/'.$product->category->name.'/'.$product->image)}}" alt="" />
											<h2>{{$product->price}} VND</h2>
											<p>{{$product->name}}</p>
											<a href="" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
                            </a>
						</div>
						
						@endforeach
						</div>
					</div><!--features_items-->
			</div>
		</div>
	</div>
</section>
@endsection