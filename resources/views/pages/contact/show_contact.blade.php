@extends('layout')
@section('content')

<div id="contact-page" class="container">
    	<div class="bg">
	    	<div class="row">    		
	    		<div class="col-sm-12">    			   			
					<h2 class="title text-center">Liên hệ với <strong>chúng tôi</strong></h2>    			    				    				
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d979.7024670614308!2d106.6946614291637!3d10.825857716754784!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528f3c0c28d0f%3A0xca0a86a8991a42d3!2zTmjDoCB0aOG7nSBHacOhbyB44bupIELhur9uIEjhuqNp!5e0!3m2!1svi!2s!4v1659231113607!5m2!1svi!2s" width="1140" height="450" style="border:0; margin-bottom: 20px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
					</div>
				</div>			 		
			</div>    	
    		<div class="row">  	
	    		<div class="col-sm-8">
	    			<div class="contact-form">
	    				<h2 class="title text-center">Liên hệ</h2>
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form role="form" action="{{URL::to('/send-mail')}}" method="get">
				            <div class="form-group col-md-6">
				                <input type="text" name="send_name" class="form-control" required="required" placeholder="Họ và tên">
				            </div>
				            <div class="form-group col-md-6">
				                <input type="email" name="send_email" class="form-control" required="required" placeholder="Địa chỉ email">
				            </div>
				            <div class="form-group col-md-12">
				                <input type="text" name="send_subject" class="form-control" required="required" placeholder="Tiêu đề">
				            </div>
				            <div class="form-group col-md-12">
				                <textarea name="send_message" id="message" required="required" class="form-control" rows="8" placeholder="Nội dung gửi"></textarea>
				            </div>
				                                   
				            
				            <button type="submit" name="submit_mail" class="btn btn-primary" style="margin-left: 270px; margin-bottom: 20px; padding: 10px 100px;">Gửi</button>
				            
				        	
				        </form>
	    			</div>
	    		</div>
	    		<div class="col-sm-4">
	    			<div class="contact-info">
	    				<h2 class="title text-center">Thông tin liện hệ</h2>
	    				<address>
	    					<p>E-Shopper Inc.</p>
							<p>935 W. Webster Ave New Streets Chicago, IL 60614, NY</p>
							<p>Newyork USA</p>
							<p>Mobile: +2346 17 38 93</p>
							<p>Fax: 1-714-252-0026</p>
							<p>Email: info@e-shopper.com</p>
	    				</address>
	    				<div class="social-networks">
	    					<h2 class="title text-center">Social Networking</h2>
							<ul>
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-google-plus"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-youtube"></i></a>
								</li>
							</ul>
	    				</div>
	    			</div>
    			</div>    			
	    	</div>  
    	</div>	
    </div><!--/#contact-page-->

@endsection