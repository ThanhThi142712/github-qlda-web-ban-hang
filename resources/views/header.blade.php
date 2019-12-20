<div id="header">
		<div class="header-top">
			<div class="container">
				<div class="pull-left auto-width-left">
					<ul class="top-menu menu-beta l-inline">
						<li><a href=""><i class="fa fa-home" style="font-size:20px;" ></i> 61 Cao Lỗ, Phường 4, Quận 8</a></li>
						<li><a href=""><i class="fa fa-phone " style="font-size:20px;"></i> 0856 807 340</a></li>
					</ul>
				</div>
				<div class="pull-right auto-width-right">
					<ul class="top-details menu-beta l-inline">
						<li><a href="#"><i class="fa fa-user"style="font-size:20px;"></i>Tài khoản</a></li>
						@if(Auth::check())
						   <li><a href="">{{Auth::user()->full_name}}</a></li>
						   <li><a href="{{route('logout')}}">Đăng Xuất</a></li>

						@else
						    <li><a href="{{route('signin')}}">Đăng kí</a></li>
						    <li><a href="{{route('login')}}">Đăng nhập</a></li>
						@endif
					</ul>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-top -->
		<div class="header-body">
			<div class="container beta-relative">
				<div class="pull-left">
					<a href="index.html" id="logo"><img src="source/assets/dest/images/logo-cake1.png" width="200px" alt=""></a>
				</div>
				<div class="pull-right beta-components space-left ov">
					<div class="space10">&nbsp;</div>
					@php
					use Illuminate\Http\Request;
					$key=Request()->key; 
					@endphp
					<div class="beta-comp">
						<form role="search" method="get" id="searchform" action="{{route('search')}}">
					        <input type="text" value="{{$key}}" name="key" id="s" placeholder="Nhập từ khóa..." />
					        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
						</form>
					</div>

					<div class="beta-comp">
						
						<div class="cart">
							<div class="beta-select"><i class="fa fa-shopping-cart " style="font-size:20px;"></i> Giỏ hàng (
								@if(Session::has('cart'))
								   {{Session('cart')->totalQty}}
								@else
								     Trống
								@endif
								)
							 <i class="fa fa-chevron-down"></i></div>
							<div class="beta-dropdown cart-body">
							@if(Session::has('cart'))
								@foreach($product_cart as $product)
								<div class="cart-item">
									<a class="cart-item-delete" href="{{route('xoagiohang',$product['item']['id'])}}">
										<i class="fa fa-times"></i>
									</a>
									<div class="media">
										<a class="pull-left" href="#"><img src="source/image/product/{{$product['item']['image']}}" alt=""></a>
										<div class="media-body">
											<span class="cart-item-title">{{$product['item']['name']}}</span>
											
											<span class="cart-item-amount">{{$product['qty']}}*
											    <span>
											       @if($product['item']['promotion_price']==0)
											         {{number_format($product['item']['unit_price'])}}
											        @else
											        {{number_format($product['item']['promotion_price'])}}

											       }
											        @endif 
											     </span>													
										    </span>
										</div>
									</div>
								</div>
								@endforeach
							
								<div class="cart-caption">
									<div class="cart-total text-right">Tổng tiền:
									 <span class="cart-total-value">
									 	@if($product['item']['promotion_price']==0)
								           {{number_format($product['item']['unit_price'])}}
								        @else
								           {{number_format($product['item']['promotion_price'])}}

								        @endif 
								    VND</span>
								</div>
									<div class="clearfix"></div>

									<div class="center">
										<div class="space10">&nbsp;</div>
										<a href="{{route('dathang')}}" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
									</div>
								</div>
								@endif
							</div>
						</div> <!-- .cart -->
						
					</div>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-body -->
		<div class="header-bottom" style="background-color: #0277b8;">
			<div class="container">
				<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
				<div class="visible-xs clearfix"></div>
				<nav class="main-menu">
					<ul class="l-inline ov">
						<li><a href="{{route('trang-chu')}}">Trang chủ</a></li>
						<li><a >Loại Sản phẩm</a>
							<ul class="sub-menu">
								@foreach($loai_sp as $loai)
								<li><a href="{{route('loaisanpham',$loai->id)}}">{{$loai->name}}</a></li>
								@endforeach
							</ul>
						</li>
						<li><a href="{{route('gioithieu')}}">Giới thiệu</a></li>
						<li><a href="{{route('lienhe')}}">Liên hệ</a></li>
					</ul>
					<div class="clearfix"></div>
				</nav>
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
	</div> <!-- #header -->