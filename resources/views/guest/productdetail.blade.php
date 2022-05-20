@extends('guest.layout')

@section('content')
<div class="product-details"><!--product-details-->
    <div class="row mx-auto" style="width: fit-content; border:1px solid black">
						<div class="col-sm-4">
							<div class="view-product">
								<img src="{{asset('images/product/'.$product->category->name.'/'.$product->image)}}" />
							</div>
						</div>
						<div class="col-sm-8">
							<div class="product-information"><!--/product-information-->
								
								<h2>{{$product->name}}</h2>
								
								
								<form action="" method="POST">
									{{csrf_field() }}
								<span>
									<span>{{$product->price}} VND</span>
									<label>Quantity:</label>
									<input name="qty" type="number" min="1" value="1" />
									<input name="productid_hidden" type="hidden" value="{{$product->id}}" />
									<button type="submit" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
								</span>
								</form>

								<p><b>Condition:</b> New</p>
								<p><b>Brand:</b> {{$product->brand->name}}</p>
								<p><b>Category:</b> {{$product->category->name}}</p>
								
							</div><!--/product-information-->
						</div>
					<!--/product-details-->                 
                    <div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#description" data-toggle="tab">Descreption</a></li>
								<li><a href="#detail" data-toggle="tab">Details</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="description" >
							<p>{{$product->description}}</p>

								
								
								
							</div>
							
							<div class="tab-pane fade" id="detail" >
								
								<p></p>
								
								
							
								
							</div>							
						</div>
					</div><!--/category-tab-->
    </div>
</div>
                    
@endsection