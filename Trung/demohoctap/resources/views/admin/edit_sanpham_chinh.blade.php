@extends('admin')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            CẬP NHẬT SẢN PHẨM
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
                        @foreach($edit_sanpham_chinh as $key => $values)
                            <div class="position-center">
                        
                                <form role="form" action="{{URL::to('/update-sanpham-chinh/'.$values->sanpham_chinh_id)}}" method='post' enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm </label>
                                    <input type="txt" name="sanpham_chinh_name_1" class="form-control" id="sanpham_chinh_name_1" value="{{$values->sanpham_chinh_name}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">hình ảnh sản phẩm</label>
                                    <input type="file" name="sanpham_chinh_image_1" class="form-control" id="sanpham_chinh_image_1" ><img src="{{URL::to('public/image/sanpham/'.$values->sanpham_chinh_image)}}" height="100px" width="100px">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">mô tả sản phẩm</label>
                                    <textarea style="resize: none" rows="10" class="form-control" name="sanpham_chinh_desc_1" id="sanpham_chinh_desc">{{$values->sanpham_chinh_desc}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Chi tiết chi tiết sản phẩm</label>
                                    <textarea style="resize: none" rows="10" class="form-control" name="sanpham_chinh_content_1" id="sanpham_chinh_content_1" >{{$values->sanpham_chinh_content}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá sản phẩm </label>
                                    <input type="txt" name="sanpham_chinh_price_1" class="form-control" id="sanpham_chinh_price_1" value="{{$values->sanpham_chinh_price}}">
                                </div>
                               
                                <div class="form-group">
                                <label for="exampleInputPassword1">chọn Doanh mục sản phẩm</label>
                                    <select class="form-control input-sm m-bot15" name="sanpham_id_1">
                                   @foreach($sanpham_id as $key =>$sp)
                                        @if($sp->sanpham_id==$values->sanpham_id)
                                            <option selected value='{{$sp->sanpham_id}}'>{{$sp->sanpham_name}}</option>
                                        @else
                                            <option value='{{$sp->sanpham_id}}'>{{$sp->sanpham_name}}</option>
                                        @endelse
                                        @endif
                                    @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputPassword1">chọn thương hiệu</label>
                                    <select class="form-control input-sm m-bot15" name="thuonghieu_id_1">
                                    @foreach ($thuonghieu_id as $key =>$th)
                                        @if($th->thuonghieu_id==$values->thuonghieu_id)
                                            <option selected value='{{$th->thuonghieu_id}}'>{{$th->thuonghieu_name}}</option>
                                        @else
                                            <option value='{{$th->thuonghieu_id}}'>{{$th->thuonghieu_name}}</option>
                                        @endelse
                                        @endif
                                    @endforeach
                                    
                                    </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleInputPassword1">chọn hiển thị</label>
                                    <select class="form-control input-sm m-bot15" name="sanpham_chinh_status_1">
                                    <option value='1'>Ẩn</option>
                                    <option value='2'>Hiện</option>
                                    
                                    </select>
                                </div>
                                <button type="submit" name="update_sanpham_chinh" class="btn btn-info">Cập nhật sản phẩm</button>
                            </form>
                       
                            </div>
                        @endforeach
                        </div>
                    </section>

            </div>
           
        </div>

        @endsection