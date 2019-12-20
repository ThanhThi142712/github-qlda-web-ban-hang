@extends('master')

@section('content')


  <div class="beta-products-list">
							
		<div class="beta-products-list">
	<h4>Sản Phẩm Tăng Theo Giá </h4>
     <div class="beta-products-details">
			<p class="pull-left">Tìm Thấy {{count($sp_tang)}}</p>
			<div class="clearfix"></div>
		</div>
	<div class="row">
     @foreach($sp_tang as $sptt)
		<div class="col-sm-4">
			<div class="single-item">
				<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>

				<div class="single-item-header">
					<a href="#"><img src="source/image/product/{{$sptt->image}}" alt=""></a>
				</div>
				<div class="single-item-body">
					<p class="single-item-title">{{$sptt->name}}</p>
					<p class="single-item-price1">
							@if($sptt->promotion_price==0)
						    <span class="flash-del">{{number_format($sptt->unit_price)}} VND</span>
						 @else
						    <span class="flash-del1">{{number_format($sptt->unit_price)}} VND</span>
						    <span class="flash-sale">{{number_format($sptt->promotion_price)}} VND</span>
					     @endif
					</p>
				</div>
				<div class="single-item-caption">
					<a class="add-to-cart pull-left" href="#"><i class="fa fa-shopping-cart"></i></a>
					<a class="beta-btn primary" href="#">Details <i class="fa fa-chevron-right"></i></a>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	@endforeach
	</div>
	
   </div> <!-- .beta-products-list -->
							
						</div> <!-- .beta-products-list -->

@endsection