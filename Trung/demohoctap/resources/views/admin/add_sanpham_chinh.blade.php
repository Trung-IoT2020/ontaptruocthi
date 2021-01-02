@extends('admin')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            THÊM SẢN PHẨM
                        </header>
                        <div class="panel-body">
                        <?php 
                            use Illuminate\Support\Facades\Session;
                                $message = Session::get('message');
                                if($message)
                                {	
                                    echo $message; 
                                    Session::put('message',null);
                                }
                        ?>
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save-sanpham-chinh')}}" method='post' enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm </label>
                                    <input type="txt" name="sanpham_chinh_name" class="form-control" id="sanpham_chinh_name" placeholder="nhập tên">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">hình ảnh sản phẩm</label>
                                    <input type="file" name="sanpham_chinh_image" class="form-control" id="sanpham_chinh_image">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">mô tả sản phẩm</label>
                                    <textarea style="resize: none" rows="10" class="form-control" name="sanpham_chinh_desc" id="sanpham_chinh_desc" placeholder="Nội Dung mô tả"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Chi tiết chi tiết sản phẩm</label>
                                    <textarea style="resize: none" rows="10" class="form-control" name="sanpham_chinh_content" id="sanpham_chinh_content" placeholder="Nội Dung chi tiết"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá sản phẩm </label>
                                    <input type="txt" name="sanpham_chinh_price" class="form-control" id="sanpham_chinh_price" placeholder="nhập giá sản phẩm">
                                </div>
                               
                                <div class="form-group">
                                <label for="exampleInputPassword1">chọn Doanh mục sản phẩm</label>
                                    <select class="form-control input-sm m-bot15" name="doanhmuc_id">
                                   @foreach ($sanpham as $key =>$sp)
                                    <option value='{{$sp->sanpham_id}}'>{{$sp->sanpham_name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputPassword1">chọn thương hiệu</label>
                                    <select class="form-control input-sm m-bot15" name="thuonghieu_id">
                                    @foreach ($thuonghieu as $key =>$th)
                                    <option value='{{$th->thuonghieu_id}}'>{{$th->thuonghieu_name}}</option>
                                    @endforeach
                                    
                                    </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleInputPassword1">chọn hiển thị</label>
                                    <select class="form-control input-sm m-bot15" name="sanpham_chinh_status">
                                    <option value='1'>Hiện</option>
                                    <option value='2'>Ẩn</option>
                                    
                                    </select>
                                </div>
                                <button type="submit" name="add_thuonghieu_sanpham" class="btn btn-info">Thêm</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
           
        </div>

        @endsection