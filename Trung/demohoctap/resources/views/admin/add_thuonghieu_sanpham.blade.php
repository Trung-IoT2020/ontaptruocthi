@extends('admin')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            THÊM THƯƠNG HIỆU SẢN PHẨM
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
                                <form role="form" action="{{URL::to('/save-thuonghieu-sanpham')}}" method='post'>
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên thương hiệu</label>
                                    <input type="txt" name="thuonghieu_name" class="form-control" id="thuonghieu_name" placeholder="nhập tên">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Chi tiết tên thương hiệu</label>
                                    <textarea style="resize: none" rows="10" class="form-control" name="thuonghieu_desc" id="thuonghieu_desc" placeholder="Nội Dung"></textarea>
                                </div>
                               <!-- <div class="form-group">
                                    <label for="exampleInputFile">File Hình</label>
                                    <input type="file" id="exampleInputFile">
                                    <p class="help-block">Chọn file hình cần thiết.</p>
                                </div>-->
                                <div class="form-group">
                                <label for="exampleInputPassword1">chọn loại</label>
                                    <select class="form-control input-sm m-bot15" name="thuonghieu_status">
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