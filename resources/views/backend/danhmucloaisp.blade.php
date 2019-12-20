@extends('layout')
@section('admin_content')
<section class="wrapper">
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh Mục Sản Phẩm
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
                     
      </div>
      <div class="col-sm-4">
      </div>
      
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
              <th scope="col">id</th>
              <th scope="col">tên loai</th>
              <th scope="col">Chức Năng</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
      @foreach($list as $item)
      <tr>
      <th scope="row">{{$item->id}}</th>
      <td>{{$item->name}}</td>
      <td>
        
          <a class="active"  href="{{route('delete1',['id'=>$item->id])}}" >
            <i class="fa fa-trash-o "></i> &nbsp &nbsp
          </a>
          <a class="active"  href="{{URL::to('suaLoai')}}" >
            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
          </a>
          <a class="active"  href="{{URL::to('themLoai')}}" >
            <i class="fa fa-plus-square-o" aria-hidden="true"></i>
          </a>

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