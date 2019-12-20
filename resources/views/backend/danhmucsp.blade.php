@extends('layout')
@section('admin_content')
<section class="wrapper">
    <div class="table-agile-info">
  <div class="panel panel-default"> 
    <div class="panel-heading">
      Danh Mục Loại Sản Phẩm
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
                     
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <!--<div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>-->
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
              <th scope="col">id</th>
              <th scope="col">tên sản phẩm</th>
              <th scope="col">Hinh anh</th>
              <th scope="col">giá bán</th>
              <th scope="col">giá giảm</th>
              <th scope="col">Chức Năng</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
      @foreach($list as $item)
      <tr>
      <th scope="row">{{$item->id}}</th>
      <td>{{$item->name}}</td>
      <td>{{$item->image}}</td>
      <td>{{$item->unit_price}}</td>
      <td>{{$item->promotion_price}}</td>
      <td>
        
          <a class="active"  href="{{route('delete',['id'=>$item->id])}}" >
            <i class="fa fa-trash-o "></i> &nbsp &nbsp
          </a>
          <a class="active"  href="{{URL::to('suasanpham',['id'=>$item->id])}}" >
            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
          </a>
          <a class="active"  href="{{URL::to('themSP')}}" >
            <i class="fa fa-plus-square-o" aria-hidden="true"></i>
          </a>

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