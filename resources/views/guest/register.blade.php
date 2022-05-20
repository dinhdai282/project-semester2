<!DOCTYPE html>
<html lang="en">
<title>Sign up | SIMPLON’s Beauty Care Centre | Cosmetics and accessories</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<head>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/guest/account.css')}}">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-login">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6">
                                <a href="{{route('login_member')}}" id="login-form-link">Login</a>
                            </div>
                            <div class="col-xs-6">
                                <a href="{{route('register_member')}}" id="register-form-link" class="active">Register</a>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="register-form" style="display: block;" action="{{route('postRegister_member')}}" method="POST">
                                    @if(Session::has('success'))
                                    <div class="alert alert-success">{{Session::get('success')}}</div>
                                    @endif
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" name="name" id="register-username" class="form-control"
                                            placeholder="Name">
                                        <span class="text-danger">@error('email') {{$message}} @enderror</span>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="email" id="email" class="form-control"
                                            placeholder="Email Address">
                                        <span class="text-danger">@error('email') {{$message}} @enderror</span>
                                    </div>
                                    <div class="form-group">
                                        <input type="number" name="phone" id="phone" class="form-control"
                                            placeholder="Phone">
                                        <span class="text-danger">@error('phone') {{$message}} @enderror</span>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" id="register-password" class="form-control"
                                            placeholder="Password">
                                        <span class="text-danger">@error('password') {{$message}} @enderror</span>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="confirm_password" id="confirm-password"
                                            class="form-control" placeholder="Confirm Password">
                                        <span class="text-danger">@error('confirm_password') {{$message}} @enderror</span>
                                        @if(Session::has('password_error'))
                                            <div class="alert alert-danger">{{Session::get('password_error')}}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" name="register-submit" id="register-submit"
                                                    class="form-control btn btn-register" value="Register Now">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <a href="{{route('home')}}">Back to Homepage</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    
</body>

</html>