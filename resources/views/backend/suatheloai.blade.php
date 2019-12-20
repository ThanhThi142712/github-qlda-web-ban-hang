@extends('layout')
@section('admin_content')
<br><br><br><br>
<div class="row">
    <div class="col-lg-12">

        <section class="panel">
            <header class="panel-heading">
             Sửa Loại Sản Phẩm
             </header>
            <div class="panel-body">
                <div class="position-center">
                    <form role="form" action="{{route('themLoai')}}" method="post" class="beta-form-checkout">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên Loại  </label>
                        <input type="text" class="form-control" name="themloai" placeholder="Ten San Pham" value="{{$loaisp->name}}">
                    </div>
         
                    
                    
                    <button type="submit" class="btn btn-info">cập nhập</button>
                </form>
                </div>

            </div>
        </section>

    </div>
</div>
            
@endsection