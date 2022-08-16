@extends('layout')
@section('content')

<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
				  <li class="active">Giỏ hàng</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<?php
				$content = Cart::content();
				//echo '<pre>';
				//print_r($content);
				//echo '<pre>';
				?>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Hình ảnh</td>
							<td class="description">Mô tả sản phẩm</td>
							<td class="price" style="padding-left: 35px;">Giá</td>
							<td class="quantity" style="padding-left: 30px;">Số lượng</td>
							<td class="total" style="padding-left: 40px;">Tổng</td>
							<td style="padding-right: 30px;"></td>
						</tr>
					</thead>
					<tbody>
						@foreach($content as $v_content)
						<tr>
							<td class="cart_product">
								<img src="{{URL::to('public/uploads/product/'.$v_content->options->image)}}" alt="" width="60" />
							</td>
							<td class="cart_description">
								<h4><a href="">{{$v_content->name}}</a></h4>
								<p>Mã ID: {{$v_content->id}}</p>
							</td>
							<td class="cart_price">
								<p>{{number_format($v_content->price).' VNĐ'}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<form action="{{URL::to('/update-cart-quantity')}}" method="POST">
										{{ csrf_field() }}
									
									<div id="box" style="width: 80px;height: 50px;">
										<input class="cart_quantity_input" min="1" type="number" name="cart_quantity" value="{{$v_content->qty}}">
										
									</div>

									<input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart" class="form-control">
									<input type="submit" style=" margin-left: 20px;" style="margin-left: 10px;" value="Cập nhật" name="update_qty" class="btn btn-default btn-sm">
									
									</form>
								</div>
							</td>
							<td class="cart_discount">
								<p>Không có</p>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">
									<?php

									$subtotal = $v_content->price * $v_content->qty;
									echo number_format($subtotal).' VNĐ';

									?>
								</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						@endforeach
						
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							<li style="margin-left: 20px;">
								<h3>Mã giảm giá</h3>
								<form method="post" action="{{url('/check-coupon')}}">
									@csrf
									<input type="text" class="form-control" name="coupon" placeholder="Nhập mã giảm giá"><br>
									<input type="submit" class="btn btn-default check_coupon" name="check_coupon" value="Áp dụng mã giảm giá">
								</form>
								
							</li>
							
							
						</ul>
						
					</div>
				</div>
				<div class="col-sm-6">

					<div class="total_area">

						<ul style="margin-left: 20px;">
							<li>Tổng giỏ hàng: <span>{{Cart::priceTotal(0).' VNĐ'}}</span></li>
							<li>Thuế: <span>{{Cart::tax(0).' VNĐ'}}</span></li>
							<li>Khuyến mãi: <span>{{Cart::priceTotal(0).' VNĐ'}}</span></li>
							<li>Phí vận chuyền: <span>Miễn phí</span></li>
							
							<li>Thành tiền<span>{{Cart::total(0).' VNĐ'}}</span></li>
						</ul>
						<tr>
						
						
						</tr>
							<?php 
                                $customer_id = Session::get('customer_id');
                                if($customer_id != NULL){
                                ?>
                                <a class="btn btn-default update" href="{{URL::to('/checkout')}}">Thanh toán</a>
                                <?php 
                            }else{
                                ?>
                                <a class="btn btn-default update" href="{{URL::to('/login-checkout')}}">Thanh toán</a>
                                <?php 
                            }
                                ?>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

@endsection