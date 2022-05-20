@extends('admin.layout')

<!--Admin Form-->
@if($table == 'admin')
    @section('content')
    <div class="container">
        <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header text-white text-capitalize" style="background-color: #f500b8;"><i class="fas fa-user-shield"></i> {{$table}} Update Form</div>
                        <div class="card-body">
                            <form action="{{route('update_admin', $item->id)}}" method="POST">
                                
                                @if(Session::has('fail'))
                                <div class="alert alert-success">{{Session::get('fail')}}</div>
                                @endif
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="text-capitalize">{{$table}} ID</label>
                                    <input type="text" class="form-control" name="id" id="name" value="{{$item->id}}" readonly>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" value="{{$item->name}}" name="name" >
                                        
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="text" class="form-control" id="email" value="{{$item->email}}" name="email" >
                                    <span class="text-danger">@error('email') {{$message}} @enderror</span>
                                    @if(Session::has('error'))  
                                    <span class="text-danger">{{Session::get('error')}}</span> 
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="name">Password</label>
                                    <input type="password" class="form-control" id="phone" placeholder="******" name="password">
                                    <span class="text-danger">@error('password') {{$message}} @enderror</span>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="message">Role</label>
                                    <select class="form-select" aria-label="Default select example" name="role">
                                        <option value='' selected>Select role</option>
                                        <option value="admin">admin</option>
                                        <option value="manager">manager</option>
                                    </select>                                                                    
                                </div>
                                <div class="mx-auto">
                                    <button type="submit" class="text-right btn-create">Update</button>
                                    <a href="{{route('view', $table)}}"><button type="button" class="text-right btn-create">Back</button></a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    @endsection
@endif
<!--End Admin Form-->

<!--Product Form-->
@if($table == 'product')
    @php
        $folder = $item->category->name;
        $price = $item->price;
        $image = $item->image;
    @endphp
    @section('content')
    <div class="container">
        <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header text-white text-capitalize" style="background-color: #f500b8;"><i class="fab fa-product-hunt"></i> {{$table}} Update Form</div>
                        <div class="card-body">
                            <form action="{{route('update_product', $item->id)}}" method="POST" enctype="multipart/form-data">
                               
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="text-capitalize">{{$table}} ID</label>
                                    <input type="text" class="form-control" name="id" id="name" value="{{$item->id}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="text-capitalize">{{$table}} Name</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{$item->name}}"
                                        >

                                    @if(Session::has('producterror'))  
                                    <span class="text-danger">{{Session::get('producterror')}}</span> 
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="message">Category</label>
                                    <select class="form-select" aria-label="Default select example" name="category" id="cateid">
                                        <option value="" selected>Select Category</option>
                                        @foreach($category as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                                                     
                                </div>
                                <div class="form-group">
                                    <label for="message">Brand</label>
                                    <select class="form-select" aria-label="Default select example" name="brand" id="brand">
                                        @foreach($brands as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>                                                                   
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" class="form-control" aria-label="With textarea">
                                        {{$item->description}}
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="number" class="form-control" id="price" name="price" value="{{$item->price}}" placeholder="{{$price}}"/>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="message">Status</label>
                                    <select class="form-select" aria-label="Default select example" name="status" id="status">
                                        <option value="" selected>Select Status</option>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                        <option value="new">New Arrival</option>
                                    </select>                                 
                                </div>
                                <div class="form-group">
                                    <label for="message">Promotion</label>
                                    <select class="form-select" aria-label="Default select example" name="promotion" id="promotion">
                                        <option value="" selected>Select promotion</option>
                                        @foreach($promotions as $promotion)
                                        <option value="{{$promotion->id}}">{{$promotion->name}}</option>
                                        @endforeach
                                    </select>                                 
                                </div>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <img class="img-fluid" src="{{asset('images/product/'.$folder.'/'.$image)}}" style="width: 200px; height:200px;"/>  
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="form-control" id="image" name="image" >                            
                                        </div>
                                    </div>                                   
                                </div>

                                <div class="mx-auto">
                                    <button type="submit" class="text-right btn-create">Update</button>
                                    <a href="{{route('view', $table)}}"><button type="button" class="text-right btn-create">Back</button></a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    @endsection
@endif
<!--End Product Form-->

<!--Category Form-->
@if($table == 'category')
    @section('content')
    <div class="container">
        <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header text-white text-capitalize" style="background-color: #f500b8;"><i class="fas fa-cubes"></i> {{$table}} UpdateForm</div>
                        <div class="card-body">
                            <form method="POST" action="{{route('update_category', $item->id)}}" enctype="multipart/form-data">
                                
                                @if(Session::has('fail'))
                                <div class="alert alert-success">{{Session::get('fail')}}</div>
                                @endif
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="text-capitalize">{{$table}} ID</label>
                                    <input type="text" class="form-control" name="id" id="name" value="{{$item->id}}" readonly>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="name" class="text-capitalize">{{$table}} Name</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{$item->name}}"
                                        >
                                    
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" class="form-control" aria-label="With textarea">
                                        {{$item->description}}
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <img class="img-fluid" src="{{ asset('/images/category/'.$item->image) }}" style="width: 500px; height:500px;"/>  
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="form-control" id="image" name="image">                            
                                        </div>
                                    </div>                                   
                                </div>
                                <div class="form-group">
                                    <label for="message">Status</label>
                                    <select class="form-select" aria-label="Default select example" name="status" id="status">
                                        <option value="" selected>Select Status</option>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>                                 
                                </div>
                                <div class="mx-auto">
                                    <button type="submit" class="text-right btn-create">Update</button>
                                    <a href="{{route('view', $table)}}"><button type="button" class="text-right btn-create">Back</button></a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    @endsection
@endif
<!--End Category Form-->

<!--Promotion Form-->
@if($table == 'promotion')
    @section('content')
    <div class="container">
        <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header text-white text-capitalize" style="background-color: #f500b8;"><i class="fas fa-ad"></i> {{$table}} Update Form</div>
                        <div class="card-body">
                            <form action="{{route('update_promotion', $item->id)}}" method="POST" enctype="multipart/form-data">
                                @if(Session::has('success'))
                                <div class="alert alert-success">{{Session::get('success')}}</div>
                                @endif
                                @if(Session::has('fail'))
                                <div class="alert alert-success">{{Session::get('fail')}}</div>
                                @endif
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="text-capitalize">{{$table}} ID</label>
                                    <input type="text" class="form-control" name="id" id="name" value="{{$item->id}}" readonly>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="name" class="text-capitalize">{{$table}} Name</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{$item->name}}"
                                        >
                                    
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" class="form-control" aria-label="With textarea">
                                        {{$item->description}}
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="text-capitalize">Discount</label>
                                    <input type="text" class="form-control" name="discount" id="discount" value="{{$item->discount}}"
                                        >
                                </div>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <img class="img-fluid" src="{{ asset('/images/promotion/'.$item->image) }}" style="width: 500px; height:500px;"/>  
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="form-control" id="image" name="image">                            
                                        </div>
                                    </div>                                   
                                </div>
                                <div class="mx-auto">
                                    <button type="submit" class="text-right btn-create">Update</button>
                                    <a href="{{route('view', $table)}}"><button type="button" class="text-right btn-create">Back</button></a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    @endsection
@endif
<!--End Promotion Form-->

<!--Seller Form-->
@if($table == 'seller')
    @section('content')
    <div class="container">
        <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header text-white text-capitalize" style="background-color: #f500b8;"><i class="fas fa-ad"></i> {{$table}} Update Form</div>
                        <div class="card-body">
                            <form action="{{route('update_seller', $item->id)}}" method="POST" enctype="multipart/form-data">
                               
                                @if(Session::has('fail'))
                                <div class="alert alert-success">{{Session::get('fail')}}</div>
                                @endif
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="text-capitalize">{{$table}} ID</label>
                                    <input type="text" class="form-control" name="id" id="name" value="{{$item->id}}" readonly>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="name" class="text-capitalize">{{$table}} Name</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{$item->name}}"
                                        >
                                    
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control" id="email" value="{{$item->email}}"
                                        name="email" >
                                    
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="number" class="form-control" id="phone" name="phone" value="{{$item->phone}}" placeholder="{{$item->phone}}">
                                    
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" id="address" value="{{$item->address}}"
                                        name="address" >
                                    
                                </div>
                                <div class="form-group">
                                    <label for="store">Store</label>
                                    <select class="form-select" aria-label="Default select example" name="store" id="store">
                                        <option value="" selected>Select Store</option>
                                        <option value="590 Cach Mang Thang Tam, District 3, Ho Chi Minh City, Viet Nam">590 Cach Mang Thang Tam, District 3, Ho Chi Minh City, Viet Nam</option>   
                                        <option value="Số 8, Tôn Thất Thuyết, Mỹ Đình, Từ Liêm, Hà Nội, Viet Nam">Số 8, Tôn Thất Thuyết, Mỹ Đình, Từ Liêm, Hà Nội, Viet Nam</option>
                                        <option value="236K Lê Văn Sỹ, Phường 1, Tân Bình, Thành phố Hồ Chí Minh , Vietnam">236K Lê Văn Sỹ, Phường 1, Tân Bình, Thành phố Hồ Chí Minh , Vietnam</option>                                  
                                    </select>
                                    <span class="text-danger">@error('store') {{$message}} @enderror</span>                                   
                                </div>
                                <div class="form-group">
                                    <label for="civilid">Civil ID</label>
                                    <input type="number" class="form-control" id="civilid" name="civilid" value="{{$item->civilid}}" placeholder="{{$item->civilid}}">
                                    
                                </div>
                                <div class="mx-auto">
                                    <button type="submit" class="text-right btn-create">Update</button>
                                    <a href="{{route('view', $table)}}"><button type="button" class="text-right btn-create">Back</button></a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    @endsection
@endif
<!--End Seller Form-->

<!--Brand Form-->
@if($table == 'brand')
    @section('content')
    <div class="container">
        <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header text-white text-capitalize" style="background-color: #f500b8;"><i class="fas fa-ad"></i> {{$table}} Form</div>
                        <div class="card-body">
                            <form action="{{route('update_brand', $item->id)}}" method="POST" enctype="multipart/form-data">
                                @if(Session::has('success'))
                                <div class="alert alert-success">{{Session::get('success')}}</div>
                                @endif
                                @if(Session::has('fail'))
                                <div class="alert alert-success">{{Session::get('fail')}}</div>
                                @endif
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="text-capitalize">{{$table}} Name</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{$item->name}}"
                                        >
                                    
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" class="form-control" aria-label="With textarea">
                                    {{$item->description}}
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="message">Status</label>
                                    <select class="form-select" aria-label="Default select example" name="status" id="status">
                                        <option value="active" selected>Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>                                 
                                </div>
                                <div class="mx-auto">
                                    <button type="submit" class="text-right btn-create">Update</button></div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    @endsection
@endif
<!--End Brand Form-->