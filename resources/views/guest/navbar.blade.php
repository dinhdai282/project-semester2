@php
use App\Models\Category;

$categories = Category::all();
@endphp

<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-light">
        <span class="navbar-brand mb-0 primary-color pacifico">Simplon</span>
        <button class="navbar-toggler navbar-light" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto ">
                <li class="nav-item active">
                    <a class="nav-link text-secondary fs-5" href="{{route('home')}}">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-secondary fs-5" id="navbarDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Product
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach($categories as $category)
                            @if($category->status == 'active')
                                <a class="dropdown-item" href="{{route('product', $category->id)}}">{{$category->name}}</a>
                            @endif
                        @endforeach                       
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-secondary fs-5" href="{{route('contact')}}">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-secondary fs-5" href="{{route('about_us')}}">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-secondary fs-5" href="{{route('feedback')}}">Feedback</a>
                </li>
            </ul>
            <button class="nav-item mx-2 basket-icon" data-toggle="modal" data-target="#cart">
                <i class="fa fa-shopping-basket p-2" aria-hidden="true"> (<span class="total-count"></span>)</i>
            </button>
        </div>
</nav>
<!-- Navbar -->