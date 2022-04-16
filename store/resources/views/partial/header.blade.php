<nav class="navbar navbar-expand-md navbar-inverse bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    {{ config('app.name', '') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                     <li class="nav-item">
                       <strong>Buy and Sell Goods </strong> 
                     </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else

                        <li class="">

                       <a href="{{route('shopping_cart')}}" class="btn btn-default mx-4"> 
                          <i class="fa fa-shopping-cart" aria-hidden="true">
                          </i> Shopping Cart 
                          <span class="badge bg-dark text-light">{{Session::has('cart')? Session::get('cart')->total_quantity : ''}}</span>
                          
                      </a>
                      </li>
                        <li class="dropdown">
          <a href="#" class="dropdown-toggle btn btn-default mx-4" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">  
            <i class="fa fa-user" aria-hidden="true"> </i> {{ Auth::user()->name }} <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#" class="dropdown-item">User profile</a></li>
            <li><a href="#" class="dropdown-item">Add item </a></li>
            <li><a href="#" class="dropdown-item">Item</a></li>
            <li role="separator" class="divider dropdown-item"></li>
            <li>
              <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
          </li>
          </ul>
        </li>
                           
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> 
