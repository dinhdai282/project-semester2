@extends('guest.layout')

@section('content')
<div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-capitalize">History Cart</h1>
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
              <a class="btn btn-info btn-sm" data-bs-toggle="collapse" href="#orderdetail" aria-expanded="false" aria-controls="orderdetail">
                <i class="fas fa-info" href=""></i> Info
              </a>
              <table class="table collapse" id="orderdetail">
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