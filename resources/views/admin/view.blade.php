@extends('admin.layout')

<!--Admin-->
@if($table == 'admin')
  @section('content')
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-capitalize">{{$table}} Table</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <table class="table table-hover">
        <thead style="background-color: pink;">
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Options</th>
          </tr>
        </thead>
        <tbody>
          @foreach($admins as $admin)
          <tr class="data">
            <th scope="row">{{$admin->id}}</th>
            <td>{{$admin->name}}</td>
            <td>{{$admin->email}}</td>
            <td>{{$admin->role}}</td>
            <td class="text-right">
              <a class="btn btn-info btn-sm" href="{{url('/update/admin/'.$admin->id)}}">
                <i class="fas fa-pencil-alt"></i> Edit
              </a>
              <a class="btn btn-danger btn-sm" href="">
                <i class="fas fa-trash"></i> Delete
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
  @endsection
@endif
<!--End Admin-->

<!--Promotion-->
@if($table == 'promotion')
  @section('content')
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-capitalize">{{$table}} Table</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <table class="table table-hover">
        <thead style="background-color: pink;">
          <tr>
            <th scope="col">Id</th>
            <th scope="col" class="text-capitalize">{{$table}} Name</th>
            <th scope="col">Description</th>
            <th scope="col">Image</th>
            <th scope="col">Discount</th>
            <th scope="col">Options</th>
          </tr>
        </thead>
        <tbody>
          @foreach($promotions as $promotion)
          <tr class="data">
            <th scope="row">{{$promotion->id}}</th>
            <td>{{$promotion->name}}</td>
            <td>{{$promotion->description}}</td>
            <td><img src="{{asset('images/promotion/'.$promotion->image)}}" alt="" style="width: 100px; height: 100px;"></td>
            <td>{{$promotion->discount}}</td>
            <td class="text-right">
              <a class="btn btn-info btn-sm" href="{{url('/update/promotion/'.$promotion->id)}}">
                <i class="fas fa-pencil-alt"></i> Edit
              </a>
              <a class="btn btn-danger btn-sm" href="{{route('delete_promotion', $promotion->id)}}">
                <i class="fas fa-trash"></i> Delete
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
  @endsection
@endif
<!--End Promotion-->

<!--Product-->
@if($table == 'product')
  @section('content')
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-capitalize">{{$table}} Table</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <table class="table table-hover" id="example">
        <thead style="background-color: pink;">
          <tr>
            <th scope="col">Id</th>
            <th scope="col" class="text-capitalize">{{$table}} Name</th>
            <th scope="col">Category</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
            <th scope="col">Brand</th>
            <th scope="col">Image</th>
            <th scope="col">Status</th>
            <th scope="col">Promotion</th>
            <th scope="col">Options</th>
          </tr>
        </thead>
        <tbody>
          @foreach($products as $product)
          @php
            $category = $product->category->name;
          @endphp
          <tr class="data">
            <th scope="row">{{$product->id}}</th>
            <td>{{$product->name}}</td>
            <td>{{$product->category->name}}</td>
            <td>{{$product->description}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->brand->name}}</td>
            <td><img src="{{asset('images/product/'.$category.'/'.$product->image)}}" alt="" style="width: 100px; height: 100px;"></td>
            <td>{{$product->status}}</td>
            @if($product->promotion)
            <td>{{$product->promotion->name}}</td>
            @endif
            @if(!$product->promotion)
            <td></td>
            @endif
            <td class="text-right">
              <a class="btn btn-info btn-sm" href="{{url('/update/product/'.$product->id)}}>">
                <i class="fas fa-pencil-alt"></i> Edit
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
  @endsection
@endif
<!--End Product-->

<!--Seller-->
@if($table == 'seller')
  @section('content')
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-capitalize">{{$table}} Table</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <table class="table table-hover">
        <thead style="background-color: pink;">
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Store</th>
            <th scope="col">Address</th>
            <th scope="col">Civil ID</th>
            <th scope="col">Options</th>
          </tr>
        </thead>
        <tbody>
          @foreach($sellers as $seller)
          <tr class="data">
            <th scope="row">{{$seller->id}}</th>
            <td>{{$seller->name}}</td>
            <td>{{$seller->email}}</td>
            <td>{{$seller->phone}}</td>
            <td>{{$seller->store}}</td>
            <td>{{$seller->address}}</td>
            <td>{{$seller->civilid}}</td>
            <td class="text-right">
              <a class="btn btn-info btn-sm" href="{{url('/update/seller/'.$seller->id)}}">
                <i class="fas fa-pencil-alt"></i> Edit
              </a>
              <a class="btn btn-danger btn-sm" href="{{route('delete_seller', $seller->id)}}">
                <i class="fas fa-trash"></i> Delete
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
  @endsection
@endif
<!--End Seller-->

<!--Category-->
@if($table == 'category')
  @section('content')
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-capitalize">{{$table}} Table</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <table class="table table-hover">
        <thead style="background-color: pink;">
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Category</th>
            <th scope="col">Description</th>
            <th scope="col">Image</th>
            <th scope="col">Status</th>
            <th scope="col">Options</th>
          </tr>
        </thead>
        <tbody>
          @foreach($categories as $category)
          <tr class="data">
            <th scope="row">{{$category->id}}</th>
            <td>{{$category->name}}</td>
            <td>{{$category->description}}</td>
            <td><img src="{{asset('images/category/'.$category->image)}}" alt="" style="width: 100px; height: 100px;"></td>
            <td>{{$category->status}}</td>
            <td class="text-right">
              <a class="btn btn-info btn-sm" href="{{url('/update/category/'.$category->id)}}>">
                <i class="fas fa-pencil-alt"></i> Edit
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
  @endsection
@endif
<!--End Category-->

<!--Member-->
@if($table == 'member')
  @section('content')
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-capitalize">{{$table}} Table</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <table class="table table-hover">
        <thead style="background-color: pink;">
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Options</th>
          </tr>
        </thead>
        <tbody>
          @foreach($members as $member)
          <tr class="data">
            <th scope="row">{{$member->id}}</th>
            <td>{{$member->name}}</td>
            <td>{{$member->email}}</td>
            <td>{{$member->phone}}</td>
            <td class="text-right">
              <a class="btn btn-danger btn-sm" href="">
                <i class="fas fa-trash" href="{{route('delete_member', $member->id)}}"></i> Delete
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
  @endsection
@endif
<!--End Member-->

<!--Order-->
@if($table == 'order')
  @section('content')
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-capitalize">{{$table}} Table</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <table class="table table-hover">
        <thead style="background-color: pink;">
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Member</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Order Date</th>
            <th scope="col">Options</th>
          </tr>
        </thead>
        <tbody>
          @foreach($orders as $order)
          @php 
            $oderdetails = $order->orderdetail;
          @endphp
          <tr class="data">
            <th scope="row">{{$order->id}}</th>
            <td>{{$order->member->name}}</td>
            <td>{{$order->member->email}}</td>
            <td>{{$order->member->phone}}</td>
            <td>{{$order->created_at}}</td>
            <td class="text-right">
              <a class="btn btn-info btn-sm" data-bs-toggle="collapse" href="{{'#$order->i'}}" aria-expanded="false" aria-controls="orderdetail">
                <i class="fas fa-info" href=""></i> Info
              </a>
              <table class="table collapse" id="{{'$order->id'}}">
                <thead>
                  <tr>
                    <th scope="col">Product</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Total</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($order->orderdetail as $orderdetail)
                  <tr>
                    <td>{{$orderdetail->product->name}}</td>
                    <td>{{$orderdetail->quantity}}</td>
                    <td>{{$orderdetail->price}}</td>
                    <td>{{$orderdetail->quantity * $orderdetail->price}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
  @endsection
@endif
<!--End Order-->

<!--Brand-->
@if($table == 'brand')
  @section('content')
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-capitalize">{{$table}} Table</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <table class="table table-hover">
        <thead style="background-color: pink;">
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Brand</th>
            <th scope="col">Description</th>
            <th scope="col">Status</th>
            <th scope="col">Options</th>
          </tr>
        </thead>
        <tbody>
          @foreach($brands as $brand)
          <tr class="data">
            <th scope="row">{{$brand->id}}</th>
            <td>{{$brand->name}}</td>
            <td>{{$brand->description}}</td>
            <td>{{$brand->status}}</td>
            <td class="text-right">
              <a class="btn btn-info btn-sm" href="{{url('/update/brand/'.$brand->id)}}>">
                <i class="fas fa-pencil-alt"></i> Edit
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
  @endsection
@endif
<!--End Brand-->