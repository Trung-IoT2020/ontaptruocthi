@extends('admin')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            CẬP NHẬT THƯƠNG HIỆU SẢN PHẨM
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
                        @foreach($edit_thuonghieu_sanpham as $key => $value_edit)
                            <div class="position-center">
                               
                                <form role="form" action="{{URL::to('/update-thuonghieu-sanpham/'.$value_edit->thuonghieu_id)}}" method='post'>
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên thương hiệu</label>
                                    <input type="txt" value= "{{$value_edit->thuonghieu_name}}" name="thuonghieu_name" class="form-control" id="thuonghieu_name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Chi tiết</label>
                                    <textarea style="resize: none" value= "[[$value_edit->thuonghieu_desc]]"rows="10" class="form-control" name="thuonghieu_desc" id="thuonghieu_desc" ></textarea>
                                </div>
                
                                <button type="submit" name="update_thuonghieu" class="btn btn-info">EDIT</button>
                                </form>
                                 
                            </div>
                        @endforeach

                        </div>
                    </section>

            </div>
           
        </div>

@endsection

<!--//không lên dc giao diện chính-->
