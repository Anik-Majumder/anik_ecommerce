<!-- Navbar Start -->
<div class="container-fluid mb-5">
    <div class="row border-top px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100"
               data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                <h6 class="m-0">Categories</h6>
                <i class="fa fa-angle-down text-dark"></i>
            </a>
            <nav
                class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0"
                id="navbar-vertical">
                <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                    @foreach($categories as $category)
                        @if ($category->subcategories->count())
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link" data-toggle="dropdown">{{ $category->category_name }} <i
                                        class="fa fa-angle-down float-right mt-1"></i></a>
                                <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                                    @foreach ($category->subcategories as $subcategory)
                                        <a href="#" class="dropdown-item">
                                            {{ $subcategory->subcategory_name }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <a href="#" class="nav-item nav-link">{{$category->category_name}}</a>
                        @endif
                    @endforeach
                </div>
            </nav>
        </div>
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                <a href="" class="text-decoration-none d-block d-lg-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span
                            class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="{{route('home')}}" class="nav-item nav-link active">Home</a>
                        <a href="{{route('shop')}}" class="nav-item nav-link">Shop</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="{{route('shopping-cart')}}" class="dropdown-item">Shopping Cart</a>
                                <a href="{{route('checkout')}}" class="dropdown-item">Checkout</a>
                            </div>
                        </div>
                        <a href="{{route('contact')}}" class="nav-item nav-link">Contact</a>
                    </div>
                    <div class="navbar-nav ml-auto py-0">
                        @auth
                            <form action="{{ route('logout') }}" method="POST" class="nav-item">
                                @csrf
                                <button type="submit" class="nav-link btn btn-link" style="border: none; padding: 0; background: none;">
                                    Logout
                                </button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="nav-item nav-link">Login</a>
                            <a href="{{ route('register') }}" class="nav-item nav-link">Register</a>
                        @endauth
                    </div>
                </div>
            </nav>
            <div id="header-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($banners as $banner)
                        <div class="carousel-item {{ $banner->id == 1 ? 'active' : '' }} " style="height: 410px;">
                            <img class="img-fluid" src="{{asset($banner->banner_img)}}" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">

                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">{{ $banner->banner_title_1 }}</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">{{ $banner->banner_title_2 }}</h3>
                                    <a href="{{ $banner->banner_btn_link }}"
                                       class="btn btn-light py-2 px-3">{{ $banner->banner_btn_text }}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                    <div class="btn btn-dark" style="width: 45px; height: 45px;">
                        <span class="carousel-control-prev-icon mb-n2"></span>
                    </div>
                </a>
                <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                    <div class="btn btn-dark" style="width: 45px; height: 45px;">
                        <span class="carousel-control-next-icon mb-n2"></span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Navbar End -->

