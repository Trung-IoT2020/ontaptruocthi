@extends('admin')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            CẬP NHẬT DOANH MỤC SẢN PHẨM
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
                        @foreach($edit_sanpham as $key => $value_edit)
                            <div class="position-center">
                               
                                <form role="form" action="{{URL::to('/update-sanpham/'.$value_edit->sanpham_id)}}" method='post'>
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input type="txt" value= "{{$value_edit->sanpham_name}}" name="sanpham_name" class="form-control" id="sanpham_name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Chi tiết</label>
                                    <textarea style="resize: none" value= "[[$value_edit->sanpham_desc]]"rows="10" class="form-control" name="sanpham_desc" id="sanpham_desc" ></textarea>
                                </div>
                
                                <button type="submit" name="update_sanpham" class="btn btn-info">Thêm</button>
                                </form>
                                 
                            </div>
                        @endforeach

                        </div>
                    </section>

            </div>
           
        </div>

@endsection

<!--//không lên dc giao diện chính-->
