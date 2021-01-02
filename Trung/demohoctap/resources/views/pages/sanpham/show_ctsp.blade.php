@extends('index')
@section('content')

<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
					<!--danhmuc-->
					<div class="brands_products"><!--brands_products-->
							<h2>Danh Mục Sản Phẩm</h2>
							@foreach($danhmuc as $keys => $dm)
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									<li><a href="{{URL::to('/danh-muc-san-pham/'.$dm->sanpham_id)}}"> <span class="pull-right"></span>{{$dm->sanpham_name}}</a></li>
								</ul>
							</div>
							@endforeach
						</div><!--/brands_products-->
						
					<!--thuonghieu-->
						<div class="brands_products"><!--brands_products-->
							<h2>Thương Hiệu Sản Phẩm</h2>
							@foreach($thuonghieu as $keys => $th)
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									<li><a href="{{URL::to('/thuong-hieu-san-pham/'.$th->thuonghieu_id)}}"> <span class="pull-right"></span>{{$th->thuonghieu_name}}</a></li>
								</ul>
							</div>
							@endforeach
						</div><!--/brands_products-->
						
						<!--gia-->
						<div class="price-range"><!--price-range-->
							<h2>Giá Sản Phẩm</h2>
							<div class="well text-center">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
								 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
							</div>
						</div><!--/price-range-->
					
					</div>
				</div>
				<div class="col-sm-9 padding-right">
					@foreach($show_chitiet as $keys=> $ctsp)
					<h3>Sản phẩm</h3>
					<div class="product-details"><!--product-details-->
					
						<div class="col-sm-5">
						
							<div class="view-product">
								<img src="{{asset('public/image/sanpham/'.$ctsp->sanpham_chinh_image)}}" alt="" />
								
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <!-- Wrapper for slides -->
								    <div class="carousel-inner">
										<div class="item active">
										  <a href=""><img src="{{asset('public/fontend/images/product-details/similar1.jpg')}}" alt=""></a>
										  <a href=""><img src="{{asset('public/fontend/images/product-details/similar2.jpg')}}" alt=""></a>
										  <a href=""><img src="{{asset('public/fontend/images/product-details/similar3.jpg')}}" alt=""></a>
										</div>
										<div class="item">
										  <a href=""><img src="{{asset('public/fontend/images/product-details/similar1.jpg')}}" alt=""></a>
										  <a href=""><img src="{{asset('public/fontend/images/product-details/similar2.jpg')}}" alt=""></a>
										  <a href=""><img src="{{asset('public/fontend/images/product-details/similar3.jpg')}}" alt=""></a>
										</div>
										<div class="item">
										  <a href=""><img src="{{asset('public/fontend/images/product-details/similar1.jpg')}}" alt=""></a>
										  <a href=""><img src="{{asset('public/fontend/images/product-details/similar2.jpg')}}" alt=""></a>
										  <a href=""><img src="{{asset('public/fontend/images/product-details/similar3.jpg')}}" alt=""></a>
										</div>
										
									</div>

								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="{{asset('public/fontend/images/product-details/new.jpg')}}" class="newarrival" alt="" />  <!--cho đẹp :))-->
								<h2>{{$ctsp->sanpham_chinh_name}}</h2>
                                <p>Web ID: 1000{{$ctsp->sanpham_chinh_id}}</p>
                              
								<img src="{{asset('public/fontend/images/product-details/rating.png')}}" alt="" />  <!--cho đẹp :))-->
								<form action="{{URL::to('/show_giohang')}}" method="POST">
									{{csrf_field()}}
								<span>
									<span>{{number_format($ctsp->sanpham_chinh_price).'VNĐ'}}</span>
									<label>Số Lượng:</label>
									<input type="number" min='1' value="1" name="soluong_muahang"/>
									<input name="sanpham_id_hidden" type="hidden" value="{{$ctsp->sanpham_chinh_id}}"/>
									<button type="submit" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
								</span>
								</form>
								<p><b>Tình trạng:</b> Còn hàng</p>
								<p><b>Điều kiện:</b> NEW</p>
								<p><b>Thương hiệu:

                                </b>@foreach ($thuonghieu as $key =>$th)
                                        @if($th->thuonghieu_id==$ctsp->thuonghieu_id)
                                        {{$th->thuonghieu_name}}
                                        @endif
                                    @endforeach
                                    </p>
                                    <!--cho đẹp :))-->
								<a href=""><img src="{{asset('public/fontend/images/product-details/share.png')}}" class="share img-responsive"  alt="" /></a>  <!--cho đẹp :))-->
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li><a href="#mota" data-toggle="tab">Mô tả</a></li>
                                <li><a href="#details" data-toggle="tab">chi tiết</a></li>
								<li class="active"><a href="#reviews" data-toggle="tab">Đánh giá</a></li>
							</ul>
						</div>
						<div class="tab-content">
                        <div class="tab-pane fade" id="mota" >		
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{asset('public/image/sanpham/'.$ctsp->sanpham_chinh_image)}}" alt="" />
												<h2>{{$ctsp->sanpham_chinh_name}}</h2>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                            
                                        </div>
                                       
                                    </div>
                                </div>
                                <p>{{$ctsp->sanpham_chinh_desc}}</p>
                                
							</div>
							<div class="tab-pane fade" id="details" >		
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{asset('public/image/sanpham/'.$ctsp->sanpham_chinh_image)}}" alt="" />
												<h2>{{$ctsp->sanpham_chinh_name}}</h2>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                            
                                        </div>
                                       
                                    </div>
                                </div>
                                <p>{{$ctsp->sanpham_chinh_content}}</p>
                                
							</div>
							
							<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">
									<ul>
										<li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
										<li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
										<li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
									</ul>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
									<p><b>Write Your Review</b></p>
									
									<form action="#">
										<span>
											<input type="text" placeholder="Your Name"/>
											<input type="email" placeholder="Email Address"/>
										</span>
										<textarea name="" ></textarea>
										<b>Rating: </b> <img src="{{asset('public/fontend/images/product-details/rating.png')}}" alt="" />
										<button type="button" class="btn btn-default pull-right">
											Submit
										</button>
									</form>
								</div>
							</div>
							
						</div>
					</div><!--/category-tab-->
<!-- 					
					<div class="recommended_items">
						<h2 class="title text-center">Sản Phẩm Liên Quan</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
                                @foreach($show_hinhanhthem as $keys => $values)
								<div class="item active">	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{asset('public/image/sanpham/'. $values->sanpham_chinh_image)}}" alt="" />
													<h2>{{$values->sanpham_chinh_name}}</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>

                                </div>
                                @endforeach
								<div class="item">	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{asset('public/fontend/images/home/recommend1.jpg')}}" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>

								</div>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div>
					@endforeach
				</div> -->
       </div>
       </div>
   </section>
   
@endsection