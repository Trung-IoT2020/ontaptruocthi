@extends('layout')
@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
              <li class="active">Giỏ hàng của bạn</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <?php
                $content = Cart::content();
                // echo '<pre>';
                // print_r($content);
                //table table-condensed  
            ?>
            <table class="col-sm-12 clearfix">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Hình ảnh</td>
                        <td class="description">Mô tả</td>
                        <td class="price">Giá</td>
                        <td class="quantity">Số lượng</td>
                        <td class="total">Tổng tiền</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach($content as $v_content)        
                    @endforeach --}}
                    @php
                        print_r(Session::get('cart'));
                    @endphp
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="" width="50" alt="" /></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href=""></a></h4>
                            <p>Web ID: 1089772</p>
                        </td>
                        <td class="cart_price">
                            <p></p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <form action="" method="POST">
                                   
                                    <input class="cart_quantity_input" type="text" name="cart_quantity" value="">
                                    <input type="hidden" value="" name="rowId_cart" class="form-control">
                                    <input type="submit" value="Cập nhật" name="update_qty" class="btn btn-default btn-sm">
                                </form>
                            </div>
                        </td>
                        <td class="cart_total">
                           {{-- tinh tien --}}
                            <p class="cart_total_price">
                                <?php
                                    $subtotal = $v_content->price * $v_content->qty;
                                    echo number_format($subtotal).' '.'VND';
                                ?>
                        </td>   
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                  
                </tbody>    
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->

<section id="do_action">
    <div class="container">
        
        <div class="row">
                
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>    
                        <li>Tổng <span></span></li>
                        <li>Phí vận chuyển <span>Free</span></li>
                        <li>Thành tiền <span></span></li>
                    </ul>
                        {{-- <a class="btn btn-default update" href="">Update</a> --}}
                        {{-- <a class="btn btn-default check_out" href="{{URL::to('/login-checkout')}}">Thanh toán</a> --}}
                       
                            <a class="btn btn-default check_out" href="">Thanh toán</a>
                            <a class="btn btn-default check_out" href="">Thanh toán</a>
                      
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->
@endsection