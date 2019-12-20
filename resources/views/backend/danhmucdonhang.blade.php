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
     
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
              <th scope="col">id</th>
              <th scope="col">id Customer</th>
               <th scope="col">ngày đặt</th>
              <th scope="col">Tổng Tiền</th>
              <th scope="col">Hình Thức Thanh Toán</th>
              <th scope="col">ghi chú</th>
              <th scope="col">Chức Năng</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
      @foreach($list as $item)
      <tr>
      <th scope="row">{{$item->id}}</th>
      <td>{{$item->id_customer}}</td>
      <td>{{$item->date_order}}</td>
      <td>{{$item->total}}</td>
      <td>{{$item->payment}}</td>
      <td>{{$item->note}}</td>
   
        <td >
        
        <a class="beta-btn primary" href="{{route('chitietdonhang')}}">Chi Tiết <i class="fa fa-chevron-right"></i></a>
        
      </td>
    </tr>
      @endforeach
       
        </tbody>
      </table>
    </div>

  </div>
</div>
</section>            
@endsection