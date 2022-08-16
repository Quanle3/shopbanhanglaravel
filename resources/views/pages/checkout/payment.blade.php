@extends('layout')
@section('content')

<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
				  <li class="active">Thanh toán giỏ hàng</li>
				</ol>
			</div><!--/breadcrums-->

			
			<div class="register-req" style="margin-top:-40px;margin-right: 1030px;">
				<p style="font-size:20px;">Bước 2:</p>
			</div><!--/register-req-->
			
			<div class="review-payment">
				<h2 style="font-size:25px;">Xem lại giỏ hàng</h2>
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
							<td class="discount">Giảm giá</td>
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
								<h4><a>{{$v_content->name}}</a></h4>
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

			<div class="review-payment">
				<h2 style="font-size:25px; margin-bottom:-120px;margin-top: -20px;">Chọn một hình thức thanh toán</h2>
			</div>
		<form action="{{URL::to('/order-place')}}" method="post">
			{{ csrf_field() }} 
			<div class="payment-options">
				<div class="col-sm-4" style="border: 3px solid #636e72; margin-top: 20px; margin-bottom: 20px; border-radius:10px;">
					<span>
						<label style="font-size:20px;margin-top: 10px;"><input type="checkbox"  value="1" name="payment_option"> Thanh toán bằng thẻ ATM</label>
					</span>

					<span>
						<label style="font-size:20px;margin-top: 10px;"><input type="checkbox" value="2" name="payment_option"> Thanh toán bằng tiền mặt</label>
					</span>
					<span>
						<label style="font-size:20px;margin-top: 10px; margin-bottom: 10px;"><input type="checkbox" style="margin-right: 5px;" value="3" name="payment_option">Thanh toán bằng thẻ ghi nợ</label>
					</span>
					<input type="submit" style="font-size:20px;margin-top:-3px; margin-bottom:10px; border-radius:5px;" value="Đặt hàng" name="send_order" class="btn btn-primary btn-sm">
				</div>
			</div>
		</form>
	</section> <!--/#cart_items-->

@endsection