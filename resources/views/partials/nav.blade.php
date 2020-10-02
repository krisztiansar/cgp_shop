<div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    @auth
        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="sidebar-heading">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    CGP Shop
                </a>
            </div>
            <div class="list-group list-group-flush">
                <div class="dropdown-divider"></div>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle dropdown-item" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-cube" aria-hidden="true"></i>
                            <label>Products</label>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <div class="leftbarBuble">
                                <a class="dropdown-item" href="{{ route('new-product') }}">
                                    New product
                                </a>
                                <a class="dropdown-item" href="{{ route('list-products') }}">
                                    All product
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle dropdown-item" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-cubes" aria-hidden="true"></i>
                            <label>Product categories</label>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <div class="leftbarBuble">
                                <a class="dropdown-item" href="{{ route('new-product-categories') }}">
                                    New product category
                                </a>
                                <a class="dropdown-item" href="{{ route('product-categories') }}">
                                    All product categories
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle dropdown-item" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <label>Shop managers</label>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <div class="leftbarBuble">
                                <a class="dropdown-item" href="{{ route('new-manager') }}">
                                    New shop manager
                                </a>
                                <a class="dropdown-item" href="{{ route('list-managers') }}">
                                    All shop manager
                                </a>
                            </div>
                        </div>
                    </li>
                </ul>

            </div>
        </div>
    @endauth
<!-- /#sidebar-wrapper -->

    @guest
        @if(isset($category_list))
            <div class="bg-light border-right" id="sidebar-wrapper">
                <div class="sidebar-heading">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        CGP Shop
                    </a>
                </div>
                <div class="list-group list-group-flush">
                    <div class="dropdown-divider"></div>
                    <ul class="navbar-nav" style="text-align: center;">
                        @foreach($category_list as $category)
                            <li class="nav-item" style="padding-bottom: 30px;">
                                <img class="leftBarImage" src="{{ asset('images/uploads/'.$category->image_name) }}" alt="">
                                <a href="#" id="{{$category->category_id}}" class="categoryLink">{{ $category->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
    @endguest

<!-- Page Content -->
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">

            @if(collect(request()->segments())->last() == 'login')
                <a class="navbar-brand" href="{{ url('/') }}">CGP Shop</a>
            @else
                <a href="#" class="toogleMenu" id="menu-toggle"><i class="fa fa-bars" aria-hidden="true"></i></a>
            @endif
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    @guest
                        <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                @if ((Auth::User()->profile) && Auth::user()->profile->avatar_status == 1)
                                    <img src="{{ Auth::user()->profile->avatar }}" alt="{{ Auth::user()->name }}" class="user-avatar-nav">
                                @else
                                    <div class="user-avatar-nav"></div>
                                @endif
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->
