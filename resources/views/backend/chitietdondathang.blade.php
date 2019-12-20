@extends('layout')
@section('admin_content')
<section class="wrapper">
    <div class="table-agile-info">
  <div class="panel panel-default"> 
    <div class="panel-heading">
      Danh Mục Don Hang
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
                     
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
              <th scope="col">id</th>
              <th scope="col">id Đơn Hàng</th>
              <th scope="col">id Sản Phẩm</th>
              
               <th scope="col">Số Lượng</th>
              <th scope="col">Giá</th>
              
              

            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
      @foreach($ds as $item)
      <tr>
      <th scope="row">{{$item->id}}</th>
      <td>{{$item->id_bill}}</td>
      <td>{{$item->id_product}}</td>
      <td>{{$item->quantity}}</td>
      <td>{{$item->unit_price}}</td>
    
    </tr>
      @endforeach
       
        </tbody>
      </table>
    </div>

  </div>
</div>
</section>            
@endsection