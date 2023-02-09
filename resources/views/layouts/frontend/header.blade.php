<div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
@if(Route::has('login'))
@auth
<li><a href="#"><i class="fa fa-user"></i> {{ Auth::user()->name }}</a></li>
<li><a href="cart.html"><i class="fa fa-user"></i> My Cart</a></li>
<li><a href="checkout.html"><i class="fa fa-user"></i> Checkout</a></li>
<li>
<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
<i class="fa fa-user"></i> Logout
</a>
<form id="logout-form" action="{{ route('logout') }}"
                    method="POST" class="d-none">
                    @csrf
</form>
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
