@extends('layout')
@section('admin_content')
<section class="wrapper">
    <div class="table-agile-info">
  <div class="panel panel-default"> 
    <div class="panel-heading">
      Danh Mục Khách Hàng
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
              <th scope="col">Full Name</th>
              <th scope="col">Email</th>
              <th scope="col">Password</th>
              <th scope="col">Phone</th>
              <th scope="col">Địa Chỉ</th>

              <th scope="col">Chức Năng</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
      @foreach($list as $item)
      <tr>
      <th scope="row">{{$item->id}}</th>
      <td>{{$item->full_name}}</td>
      <td>{{$item->email}}</td>
      <td>{{$item->password}}</td>
      <td>{{$item->phone}}</td>
       <td>{{$item->address}}</td>
      <td>
        
          <a class="active"  href="{{route('delete2',['id'=>$item->id])}}" >
            <i class="fa fa-trash-o "></i> &nbsp &nbsp
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