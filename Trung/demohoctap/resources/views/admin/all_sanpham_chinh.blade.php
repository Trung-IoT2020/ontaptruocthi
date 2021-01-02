@extends('admin')
@section('admin_content')
<div class="panel panel-default">
    <div class="panel-heading">
        Liệt kê sản phẩm
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>                
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
    <div class="table-responsive">
    <?php 
      use Illuminate\Support\Facades\Session;
      $message = Session::get('message');
      if($message)
      {	
        echo $message; 
        Session::put('message',null);
      }
    ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Tên Sản Phẩm</th>
            <th>Giá Sản Phẩm</th>  
            <th>Hình sản phẩm</th> 
            <th>Thương hiệu</th> 
            <th>Danh Mục</th> 
            <th>Hiển thị</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          <!--Show nội dung lên trang liệt kê admin-->
        @foreach($all_sanpham as $key => $giatri_db)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$giatri_db ->sanpham_chinh_name}}</td>
            <td>{{$giatri_db ->sanpham_chinh_price}}</td>
            <td><img src="public/image/sanpham/{{$giatri_db->sanpham_chinh_image}}" height="100px" width="100px"></td>
            <td>{{$giatri_db ->sanpham_name}}</td>
            <td>{{$giatri_db ->thuonghieu_name}}</td>
            
            <td>
              <?php
              if($giatri_db ->sanpham_chinh_status==1){
                ?>
                
                <a href="{{URL::to('/unactive-sanpham-chinh/'.$giatri_db->sanpham_chinh_id)}} "><span  class="fa fa-thumbs-up" style{font-size: 30px; color: red;}></span></a>
                <?php
                  }else {
                 ?>
                
                <a href="{{URL::to('/active-sanpham-chinh/'.$giatri_db->sanpham_chinh_id)}}"><span  class="fa fa-thumbs-down"></span></a>

               <?php
              }
              ?>

            </span></td>
                <!--onclick thông báo cho họ bik có chắc là xóa ko-->
                

            <td>
              <a href="{{URL::to('/edit-sanpham-chinh/'.$giatri_db->sanpham_chinh_id)}}" class="active" ui-toggle-class=""><i class="fa fa-check text-success text-active"></i></a>
              <a href="{{URL::to('/delete-sanpham-chinh/'.$giatri_db->sanpham_chinh_id)}}" onclick="return confirm('Are you sure?')" class="active" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
            </td>
      
            <td>
            <a ></a>
            </td>
          </tr>
         @endforeach
         <?php
              $cfr = count($all_sanpham);
              echo "Số lượng sản phẩm : ".$cfr;
              ?>
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
@endsection