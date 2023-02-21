<div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
@if(Route::has('login'))
@auth
<li><a href="{{ route ('profil')}}"><i class="fa fa-user"></i> {{ Auth::user()->name }}</a></li>
<li><a href="{{ route ('cart' , ['id' => Auth::user()->id])}}"><i class="fa fa-cart-shopping"></i> My Cart</a></li>
<li><a href="{{ route ('checkoutlist' , ['id' => Auth::user()->id])}}"><i class="fa fa-bag-shopping"></i> Checkout</a></li>
<li>
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="fa fa-right-from-bracket"></i> Logout
    </a>
    <form id="logout-form" action="{{ route('logout') }}"
    method="POST" class="d-none">
    @csrf
</form>
@if( Auth::user()->role == 1)
<li><a href="{{ route ('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard Admin</a></li>
@endif
</li>
@else
<li><a href="{{ route('register') }}"> <i class="fa fa-user"></i>Sign Up</a></li>
<li><a href="{{ route('login') }}"> <i class="fa fa-user"></i>Login</a></li>
@endauth
@endif

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div> <!-- End header area -->
