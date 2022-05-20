@extends('admin.layout')

<!--Admin Form-->
@if($table == 'admin')
    @section('content')
    <div class="container">
        <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header text-white text-capitalize" style="background-color: #f500b8;"><i class="fas fa-user-shield"></i> {{$table}} Form</div>
                        <div class="card-body">
                            <form action="{{route('register_admin')}}" method="POST">
                                @if(Session::has('success'))
                                <div class="alert alert-success">{{Session::get('success')}}</div>
                                @endif
                                @if(Session::has('fail'))
                                <div class="alert alert-success">{{Session::get('fail')}}</div>
                                @endif
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter your name"
                                        name="name" >
                                    <span class="text-danger">@error('name') {{$message}} @enderror</span>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control" id="email" placeholder="Enter your email"
                                        name="email" >
                                    <span class="text-danger">@error('email') {{$message}} @enderror</span>
                                </div>
                                <div class="form-group">
                                    <label for="name">Password</label>
                                    <input type="password" class="form-control" id="phone" placeholder="******"
                                        name="password">
                                    <span class="text-danger">@error('password') {{$message}} @enderror</span>
                                </div>
                                <div class="form-group">
                                    <label for="message">Role</label>
                                    <select class="form-select" aria-label="Default select example" name="role">
                                        <option selected>Select role</option>
                                        <option value="admin">admin</option>
                                        <option value="manager">manager</option>
                                    </select>
                                    <span class="text-danger">@error('role') {{$message}} @enderror</span>                                   
                                </div>
                                <div class="mx-auto">
                                    <button type="submit" class="text-right btn-create">Create</button></div>
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
    @section('content')
    <div class="container">
        <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header text-white text-capitalize" style="background-color: #f500b8;"><i class="fab fa-product-hunt"></i> {{$table}} Form</div>
                        <div class="card-body">
                            <form action="{{route('create_product')}}" method="POST" enctype="multipart/form-data">
                                @if(Session::has('success'))
                                <div class="alert alert-success">{{Session::get('success')}}</div>
                                @endif
                                @if(Session::has('fail'))
                                <div class="alert alert-success">{{Session::get('fail')}}</div>
                                @endif
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="text-capitalize">{{$table}} Name</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter product name"
                                        >
                                    <span class="text-danger">@error('name') {{$message}} @enderror</span>
                                </div>
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select class="form-select" aria-label="Default select example" name="category" id="cateid">
                                        @foreach($category as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">@error('category') {{$message}} @enderror</span>                                   
                                </div>
                                <div class="form-group">
                                    <label for="message">Brand</label>
                                    <select class="form-select" aria-label="Default select example" name="brand" id="brand">
                                        @foreach($brands as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">@error('brand') {{$message}} @enderror</span>                                   
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" class="form-control" aria-label="With textarea"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="description">Price</label>
                                    <input type="number" class="form-control" name="price" id="price" placeholder="Enter product price"
                                        >
                                    <span class="text-danger">@error('price') {{$message}} @enderror</span>
                                </div>
                                <div class="form-group">
                                    <label for="message">Status</label>
                                    <select class="form-select" aria-label="Default select example" name="status" id="status">
                                        <option value="active" selected>Active</option>
                                        <option value="inactive">Inactive</option>
                                        <option value="new">New Arrival</option>
                                    </select>                                 
                                </div>
                                <div class="form-group">
                                    <label for="message">Promotion</label>
                                    <select class="form-select" aria-label="Default select example" name="promotion" id="promotion">
                                        <option value="">Select promotion</option>
                                        @foreach($promotions as $promotion)
                                        <option value="{{$promotion->id}}">{{$promotion->name}}</option>
                                        @endforeach
                                    </select>                                 
                                </div>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="form-control" id="image" name="image">                            
                                        </div>
                                    </div>
                                    <span class="text-danger">@error('image') {{$message}} @enderror</span>
                                </div>

                                <div class="mx-auto">
                                    <button type="submit" class="text-right btn-create">Create</button></div>
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
                        <div class="card-header text-white text-capitalize" style="background-color: #f500b8;"><i class="fas fa-cubes"></i> {{$table}} Form</div>
                        <div class="card-body">
                            <form method="POST" action="{{route('create_category')}}" enctype="multipart/form-data">
                                @if(Session::has('success'))
                                <div class="alert alert-success">{{Session::get('success')}}</div>
                                @endif
                                @if(Session::has('fail'))
                                <div class="alert alert-success">{{Session::get('fail')}}</div>
                                @endif
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="text-capitalize">{{$table}} Name</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter category name"
                                        >
                                    <span class="text-danger">@error('name') {{$message}} @enderror</span>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" class="form-control" aria-label="With textarea"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="description">Image</label>
                                    <input type="file" class="form-control" id="image" name="image" aria-label="Upload">
                                    <span class="text-danger">@error('image') {{$message}} @enderror</span>
                                </div>
                                <div class="form-group">
                                    <label for="message">Status</label>
                                    <select class="form-select" aria-label="Default select example" name="status" id="status">
                                        <option value="active" selected>Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>                                 
                                </div>
                                <div class="mx-auto">
                                    <button type="submit" class="text-right btn-create">Create</button></div>
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
                        <div class="card-header text-white text-capitalize" style="background-color: #f500b8;"><i class="fas fa-ad"></i> {{$table}} Form</div>
                        <div class="card-body">
                            <form action="{{route('create_promotion')}}" method="POST" enctype="multipart/form-data">
                                @if(Session::has('success'))
                                <div class="alert alert-success">{{Session::get('success')}}</div>
                                @endif
                                @if(Session::has('fail'))
                                <div class="alert alert-success">{{Session::get('fail')}}</div>
                                @endif
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="text-capitalize">{{$table}} Name</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter promotion name"
                                        >
                                    <span class="text-danger">@error('name') {{$message}} @enderror</span>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" class="form-control" aria-label="With textarea"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="text-capitalize">Discount</label>
                                    <input type="text" class="form-control" name="discount" id="discount" placeholder="Enter discount number"
                                        >
                                </div>
                                <div class="form-group">
                                    <label for="description">Image</label>
                                    <input type="file" class="form-control" id="image" name="image" aria-label="Upload">
                                    <span class="text-danger">@error('image') {{$message}} @enderror</span>
                                </div>
                                <div class="mx-auto">
                                    <button type="submit" class="text-right btn-create">Create</button></div>
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
                        <div class="card-header text-white text-capitalize" style="background-color: #f500b8;"><i class="fas fa-ad"></i> {{$table}} Form</div>
                        <div class="card-body">
                            <form action="{{route('create_seller')}}" method="POST" enctype="multipart/form-data">
                                @if(Session::has('success'))
                                <div class="alert alert-success">{{Session::get('success')}}</div>
                                @endif
                                @if(Session::has('fail'))
                                <div class="alert alert-success">{{Session::get('fail')}}</div>
                                @endif
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="text-capitalize">{{$table}} Name</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter name"
                                        >
                                    <span class="text-danger">@error('name') {{$message}} @enderror</span>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control" id="email" placeholder="Enter email"
                                        name="email" >
                                    <span class="text-danger">@error('email') {{$message}} @enderror</span>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="number" class="form-control" id="phone" name="phone" placeholder="Enter phone">
                                    <span class="text-danger">@error('phone') {{$message}} @enderror</span>
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" id="address" placeholder="Enter address"
                                        name="address" >
                                    <span class="text-danger">@error('address') {{$message}} @enderror</span>
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
                                    <input type="number" class="form-control" id="civilid" name="civilid" placeholder="Enter civil ID">
                                    <span class="text-danger">@error('civilid') {{$message}} @enderror</span>
                                </div>
                                <div class="mx-auto">
                                    <button type="submit" class="text-right btn-create">Create</button></div>
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
                            <form action="{{route('create_brand')}}" method="POST" enctype="multipart/form-data">
                                @if(Session::has('success'))
                                <div class="alert alert-success">{{Session::get('success')}}</div>
                                @endif
                                @if(Session::has('fail'))
                                <div class="alert alert-success">{{Session::get('fail')}}</div>
                                @endif
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="text-capitalize">{{$table}} Name</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter promotion name"
                                        >
                                    <span class="text-danger">@error('name') {{$message}} @enderror</span>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" class="form-control" aria-label="With textarea"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="message">Status</label>
                                    <select class="form-select" aria-label="Default select example" name="status" id="status">
                                        <option value="active" selected>Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>                                 
                                </div>
                                <div class="mx-auto">
                                    <button type="submit" class="text-right btn-create">Create</button></div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    @endsection
@endif
<!--End Brand Form-->

