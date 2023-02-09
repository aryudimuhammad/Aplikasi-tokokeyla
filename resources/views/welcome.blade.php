@extends('layouts.frontend.app')
@section('title') Toko Keyla @endsection
@section('content')
    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
            </div>
        </div>
    </div> <!-- End mainmenu area -->

    <div class="slider-area">
        	<!-- Slider -->
			<div class="block-slider block-slider4">
				<ul class="" id="bxslider-home4">
					<li>
						<img src="{{ asset ('img/h4-slide.png')}}" alt="Slide">
						<div class="caption-group">
							<h2 class="caption title">
								iPhone <span class="primary">6 <strong>Plus</strong></span>
							</h2>
							<h4 class="caption subtitle">Dual SIM</h4>
							<a class="caption button-radius" href="#"><span class="icon"></span>Shop now</a>
						</div>
					</li>
					<li><img src="{{ asset ('img/h4-slide2.png')}}" alt="Slide">
						<div class="caption-group">
							<h2 class="caption title">
								by one, get one <span class="primary">50% <strong>off</strong></span>
							</h2>
							<h4 class="caption subtitle">school supplies & backpacks.*</h4>
							<a class="caption button-radius" href="#"><span class="icon"></span>Shop now</a>
						</div>
					</li>
					<li><img src="{{ asset ('img/h4-slide3.png')}}" alt="Slide">
						<div class="caption-group">
							<h2 class="caption title">
								Apple <span class="primary">Store <strong>Ipod</strong></span>
							</h2>
							<h4 class="caption subtitle">Select Item</h4>
							<a class="caption button-radius" href="#"><span class="icon"></span>Shop now</a>
						</div>
					</li>
					<li><img src="{{ asset ('img/h4-slide4.png')}}" alt="Slide">
						<div class="caption-group">
						  <h2 class="caption title">
								Apple <span class="primary">Store <strong>Ipod</strong></span>
							</h2>
							<h4 class="caption subtitle">& Phone</h4>
							<a class="caption button-radius" href="#"><span class="icon"></span>Shop now</a>
						</div>
					</li>
				</ul>
			</div>
			<!-- ./Slider -->
    </div> <!-- End slider area -->

    <div class="promo-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo1">
                        <i class="fa fa-refresh"></i>
                        <p>30 Days return</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo2">
                        <i class="fa fa-truck"></i>
                        <p>Free shipping</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo3">
                        <i class="fa fa-lock"></i>
                        <p>Secure payments</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo4">
                        <i class="fa fa-gift"></i>
                        <p>New products</p>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End promo area -->

    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">PRODUK</h2>
                        <div class="container">

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    @foreach($produk as $d)
        <div class="col">
            <div class="card shadow-sm">
                <img src="{{ asset ($d->gambar) }}" alt="gambar">
                <div class="card-body">
                    <h1>{{ $d->nama_barang }}</h1>
                    <p class="card-text">{{$d->keterangan}}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="text-muted">Rp. {{number_format($d->harga, 0, ',', '.') }},-</h4>
                        <div class="btn-group">
                            @if(Route::has('login'))
                            @auth
                            <form method="POST" action="{{ route ('cart' , ['id' => Auth()->user()->id])}}">
                                @csrf
                                <input type="text" hidden name="produk_id" value="{{$d->id}}">
                                <input type="text" hidden name="user_id" value="{{ Auth()->user()->id}}">

                                <a type="button" href="{{route('detail' , ['id' => $d->id])}}" class="btn btn-info">Detail</a>
                                <button type="submit" class="btn btn-primary">Tambahkan Cart</button>
                            </form>
                            @else
                                <a type="button" href="{{route('detail' , ['id' => $d->id])}}" class="btn btn-info">Detail</a> &NonBreakingSpace;
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambahkan Cart</button>
                            @endauth
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


</div>
<br><br>
<div class="d-flex justify-content-center">
    {{ $produk->links() }}
</div>
</div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End main content area -->

@include('home.logindahulu')
@endsection
