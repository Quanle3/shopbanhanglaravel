@extends('layout')
@section('content')
<div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Sản phẩm mới nhất</h2>
                        @foreach($all_product as $key => $product)
                         <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}">
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                
                                <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="" />
                                            <p style="margin-top: 15px">{{$product->product_name}}</p>
                                            <h2>{{number_format($product->product_price).' VNĐ'}}</h2>
                                            
                                            <button type="submit" href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}" class="btn btn-default add-to-cart">
                                                <i class="fa fa-shopping-cart"></i>
                                                Xem chi tiết
                                            </button>
                                        </div>
                                        
                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="#"><i class="fa fa-plus-square" style="margin-left: 10px;"></i>Thêm vào mục yêu thích</a></li>
                                        <li><a href="#"><i class="fa fa-plus-square"></i>So Sánh</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </a>
                        @endforeach
                                                
                    </div><!--features_items-->
                    




@endsection