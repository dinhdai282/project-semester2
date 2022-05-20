@extends('guest.layout')
@section('content')
<div class="container">
        <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header text-white text-capitalize" style="background-color: #f500b8;"><i class="fas fa-user-shield"></i> Member Update Form</div>
                        <div class="card-body">
                            <form action="{{route('postUpdate_member', $user->id)}}" method="POST">
                                
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" value="{{$user->name}}" name="name" >
                                  
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="text" class="form-control" id="email" value="{{$user->email}}" name="email" >
                                    <span class="text-danger">@error('email') {{$message}} @enderror</span>
                                    @if(Session::has('error'))  
                                    <span class="text-danger">{{Session::get('error')}}</span> 
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" placeholder="******" name="password">
                                    @if(Session::has('passworderror'))  
                                    <span class="text-danger">{{Session::get('passworderror')}}</span> 
                                    @endif                               
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="number" class="form-control" id="password" value="{{$user->phone}}" name="phone">
                                    <span class="text-danger">@error('phone') {{$message}} @enderror</span>                                 
                                </div>
                                <div class="mx-auto">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection