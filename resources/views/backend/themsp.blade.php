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
                                <form role="form" action="{{route('themsanpham')}}" method="post">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Sản Phẩm</label>
                                    <input type="text" class="form-control" name="name" placeholder="Ten San Pham">
                                </div>
                                <div>
                                    <label for="exampleInputEmail1">Loại Sản Phẩm</label>
                                   <select name="loai">
                                    @foreach($listcat as $item)
                                             <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                         
                                          
                                   </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô Tả</label>
                                    <textarea type="text" style="resize: none;" rows="3" class="form-control" name="mota" placeholder="Mo ta"></textarea> 
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá Bán </label>
                                    <input type="text" class="form-control" name="giaban" placeholder="Gia Ban">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá Giảm</label>
                                    <input type="text" class="form-control" name="giagiam" placeholder="Gia Giam">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">Hình ảnh</label>
                                    <input type="file" id="exampleInputFile" name="hinhanh">
                                    
                                </div>

                                <div class="checkbox">Khuyến mãi
                                    <select name="new">
                                       <option value="0">0</option>
                                        <option value="1">1</option>
                                    </select>
                                </div>
                                
                                <button type="submit" class="btn btn-info">Thêm</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
</div>
            
@endsection