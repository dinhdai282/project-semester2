<!-- Header -->
@php 
use App\Models\Member;
@endphp
<header>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12 col-12">
                </div>
                <div class="col-md-4 col-12 text-center">
                    <h2 class="my-md-3 site-title primary-color">Simplon</h2>
                </div>
                @if(Session::has('userID'))
                @php
                    $user = Member::find(intval(Session::get('userID')));
                @endphp
                <div class="col-md-4 col-12 text-right">
                    <div class="btn-group">
                        <button class="btn border dropdown-toggle my-md-4 my-2 text-capitalize" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <b>Welcome {{$user->name}}</b>
                        </button>
                        <div class="dropdown-menu">
                            <a href="" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal">Information</a>
                            <a href="{{route('logout_member')}}" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header bg-primary-color">
                        <div class="col-5"></div>
                        <div class="col-5">
                            <h3 class="modal-title text-center text-capitalize" id="exampleModalLabel"><b>{{$user->name}}</b></h3>
                            <h5 class="text-center">Personal Information</h5>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="username" class="form-label">Name</label>
                                <input type="text" class="form-control" id="" name="username" readonly value="{{$user->name}}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" readonly value="{{$user->email}}">
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="number" class="form-control" id="" name="phone" readonly value="{{$user->phone}}">
                            </div>
                            <div class="mb-3 mx-auto" style="width: 200px;">
                                <a href="{{route('history_cart', $user->id)}}"><button type="button" class="btn btn-info" style="width: 200px;">View History Cart</button></a>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <a href="{{route('update_member', $user->id)}}"><button type="button" class="btn btn-danger">Edit Information</button></a>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
                </div>
                @else
                <div class="col-md-4 col-12 text-right">                    
                    <p class="my-md-4 header-links">
                        <a href="{{route('login_member')}}" class="px-2" style="color: black;"><b>Log In / Register</b></a>
                    </p>
                </div>
                @endif
            </div>
        </div>
        
    
    </header>
    <!-- Header -->