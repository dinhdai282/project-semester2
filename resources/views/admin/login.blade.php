<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="{{asset('css/admin/admin.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    <section class="form">

      <div class="container mt-5 border-primary-color rounded" style="height: 500px; width: 750px;">

        <div class="row" style="height: 495px; width: 750px;">

          <div class="col-lg-5 border bg-primary-color">
            <h1 class="site-title primary-color pacifico text-center" style="margin-top: 200px;">Simplon</h1>
          </div>

          <div class="col-lg-7 my-auto">
            <h2 class="my-3 text-center site-title primary-color pacifico">LOGIN</h2>
            <form action="{{route('login_admin')}}" method="POST">
              @csrf
              <div class="mb-3 row">
                <div class="col-lg-2">
                  <label for="username" class="form-label pacifico">Email: </label>
                </div>
                <div class="col-lg-10">
                  <input type="text" class="form-control pacifico" placeholder="Enter your username here..." id="email" name="email">
                </div>
                <span class="text-danger">@error('email') {{$message}} @enderror</span>
              </div>
              @if(Session::has('fail'))
                  <div class="alert alert-danger">{{Session::get('fail')}}</div>
              @endif

              <div class="mb-3 row">
                <div class="col-lg-2">
                  <label for="password" class="form-label pacifico">Password: </label>
                </div>
                <div class="col-lg-10">
                  <input type="password" class="form-control" id="password" placeholder="********" name="password">
                </div>
                <span class="text-danger">@error('password') {{$message}} @enderror</span>
              </div>
              @if(Session::has('fails'))
                  <div class="alert alert-danger">{{Session::get('fails')}}</div>
              @endif

              <div class="mb-3 row">
                  <button type="submit" class="btn-login mx-auto site-title primary-color pacifico">Login</button>
              </div>

            </form>

          </div>

        </div>

      </div>
    </section>
</body>
</html>