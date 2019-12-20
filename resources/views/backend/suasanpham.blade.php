@extends('layout')
@section('admin_content')
<br><br><br><br>
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                         Thêm Sản Phẩm
                     </header>
                        <div class="panel-body">
                            <div class="position-center">
                                
                                <form role="form" action="" method="post">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Sản Phẩm</label>
                                    <input type="text" class="form-control" name="name" placeholder="Ten San Pham" value="{{$idsp->name}}" disabled>
                                </div>
                                <div>
                                    <label for="exampleInputEmail1">Loại Sản Phẩm</label>
                                   <input type="text" class="form-control" name="loai" placeholder="Gia Giam" value="{{$idsp->id_type}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô Tả</label>
                                    <textarea type="text" style="resize: none;" rows="3" class="form-control" name="mota" placeholder="Mo ta" disabled>{{$idsp->description}}</textarea> 
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá Bán </label>
                                    <input type="text" class="form-control" name="giaban" placeholder="Gia Ban" value="{{$idsp->unit_price}}">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá Giảm</label>
                                    <input type="text" class="form-control" name="giagiam" placeholder="Gia Giam" value="{{$idsp->promotion_price}}">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile" >Hình ảnh: {{$idsp->image}} </label>
                                 

                                    
                                </div>

                                <div class="checkbox">Khuyến mãi
                                   <input type="text" class="form-control" name="new" placeholder="Gia Giam" value="{{$idsp->new}}">
                                </div>
                                
                                <button type="submit" class="btn btn-info">Thêm</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
</div>
            
@endsection