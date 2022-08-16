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

			<div class="register-req" style="margin-right: 720px;">
				<p style="font-size:18px;">Bước 1:</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					
					<div class="col-sm-12">
						<div class="bill-to">
							<p>Điền thông tin gửi hàng</p>
							<div class="form-one" >
								<form action="{{URL::to('/save-checkout-customer')}}" method="post" >
									{{ csrf_field() }}
									<input type="text" style="font-size:20px;" name="shipping_name" placeholder="Họ và tên">
									<input type="text" style="font-size:20px;" name="shipping_email" placeholder="Địa chỉ email">
									<input type="text" style="font-size:20px" name="shipping_address" placeholder="Địa chỉ giao hàng">
									<input type="text" style="font-size:20px" name="shipping_phone" placeholder="Số điện thoại">

									<textarea name="shipping_notes" style=" font-size: 20px;"  placeholder="Ghi chú đơn hàng của bạn" rows="10"></textarea>
									<input type="submit" style="font-size:20px" value="Gửi đơn hàng" name="send_order" class="btn btn-primary btn-sm">
								</form>
							</div>
							
						</div>
					</div>

				</div>
			</div>

			
			
			
		</div>
	</section> <!--/#cart_items-->

@endsection