<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home | SIMPLON’s Beauty Care Centre | Cosmetics and accessories</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link href="{{asset('css/guest/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/guest//prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('css/guest/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('css/guest/animate.css')}}" rel="stylesheet">
	<link href="{{asset('css/guest/responsive.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/guest/main.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
    <script src="https://kit.fontawesome.com/92d9d22f8b.js"></script>
</head>

<body>
<!--Header-->
@include('guest.header')

<!--Navbar-->
@include('guest.navbar')

<!--Cart--> 
@include('guest.cart')

<!-- Main Section -->
<main>
    @yield('content')
</main>

<!--Footer--> 
@include('guest.footer')

<!-- Script -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <!-- Script -->
	<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('frontend/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('frontend/js/price-range.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.prettyPhoto.js')}}"></script>

    <script type="text/javascript" src="{{asset('js/admin/admin.js')}}"></script>
    <script src="{{asset('js/guest/slide.js')}}"></script>
    <script src="{{asset('js/guest/main.js')}}"></script>

</body>

</html>