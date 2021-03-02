<main id="main" class="main-site">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">home</a></li>
                <li class="item-link"><span>detail</span></li>
            </ul>
        </div>
        <div class="row">

            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
                <div class="wrap-product-detail">
                    <div class="detail-media">
                        <div class="product-gallery">
                            <ul class="slides">
                                <li data-thumb="{{asset('storage/'. $product->feature_img_path)}}">
                                    <img src="{{asset('storage/'. $product->feature_img_path)}}"/>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="detail-info">
                        {{--                        <div class="product-rating">--}}
                        {{--                            <i class="fa fa-star" aria-hidden="true"></i>--}}
                        {{--                            <i class="fa fa-star" aria-hidden="true"></i>--}}
                        {{--                            <i class="fa fa-star" aria-hidden="true"></i>--}}
                        {{--                            <i class="fa fa-star" aria-hidden="true"></i>--}}
                        {{--                            <i class="fa fa-star" aria-hidden="true"></i>--}}
                        {{--                            <a href="#" class="count-review">(05 review)</a>--}}
                        {{--                        </div>--}}
                        <h2 class="product-name text-uppercase">{{$product->name}}</h2>
                        {{--                        <div class="short-desc">--}}
                        {{--                            <ul>--}}
                        {{--                                <li>7,9-inch LED-backlit, 130Gb</li>--}}
                        {{--                                <li>Dual-core A7 with quad-core graphics</li>--}}
                        {{--                                <li>FaceTime HD Camera 7.0 MP Photos</li>--}}
                        {{--                            </ul>--}}
                        {{--                        </div>--}}
                        <div class="wrap-social">
                            <a class="link-socail" href="#"><img src="assets/images/social-list.png" alt=""></a>
                        </div>
                        <div class="wrap-price"><span
                                class="product-price">{{number_format($product->regular_price, 0, '.', '.')}}</span>
                        </div>
                        {{--                        <div class="stock-info in-stock">--}}
                        {{--                            <p class="availability">Availability: <b>In Stock</b></p>--}}
                        {{--                        </div>--}}
                        <div class="quantity">
                            <span>Số lượng:</span>
                            <div class="quantity-input">
                                <input type="text" name="product-quatity" value="1" data-max="120" pattern="[0-9]*">

                                <a class="btn btn-reduce" href="#"></a>
                                <a class="btn btn-increase" href="#"></a>
                            </div>
                        </div>
                        <div class="wrap-butons">
                            <a href="#" class="btn add-to-cart">Add to Cart</a>
                        </div>
                    </div>
                    <div class="advance-info">
                        <div class="tab-control normal">
                            <a href="#review" class="tab-control-item active">Nhận xét</a>
                            <a href="#description" class="tab-control-item ">Miêu tả</a>
                        </div>
                        <div class="tab-contents">
                            <div class="tab-content-item " id="description">
                                <p>{!! $product->description !!} </p>
                            </div>

                            <div class="tab-content-item active" id="review">
                                @auth
                                    @livewire('comment', ['product_id' => $product->id])
                                @else
                                    <p class="text-xl text-red-500">Đăng nhập để comment</p>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end main products area-->

            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
                <div class="widget widget-our-services ">
                    <div class="widget-content">
                        <ul class="our-services">

                            <li class="service">
                                <a class="link-to-service" href="#">
                                    <i class="fa fa-truck" aria-hidden="true"></i>
                                    <div class="right-content">
                                        <b class="title">Free Shipping</b>
                                        <span class="subtitle">On Oder Over $99</span>
                                        <p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
                                    </div>
                                </a>
                            </li>

                            <li class="service">
                                <a class="link-to-service" href="#">
                                    <i class="fa fa-gift" aria-hidden="true"></i>
                                    <div class="right-content">
                                        <b class="title">Special Offer</b>
                                        <span class="subtitle">Get a gift!</span>
                                        <p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
                                    </div>
                                </a>
                            </li>

                            <li class="service">
                                <a class="link-to-service" href="#">
                                    <i class="fa fa-reply" aria-hidden="true"></i>
                                    <div class="right-content">
                                        <b class="title">Order Return</b>
                                        <span class="subtitle">Return within 7 days</span>
                                        <p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div><!-- Categories widget-->

                <div class="widget mercado-widget widget-product">
                    <h2 class="widget-title">Popular Products</h2>
                    <div class="widget-content">
                        <ul class="products">
                            @foreach($popular_product as $po_pro)
                                <li class="product-item">
                                    <div class="product product-widget-style">
                                        <div class="thumbnnail">
                                            <a href="detail.html"
                                               title="">
                                                <figure><img
                                                        src="{{asset('assets/images/products')}}/{{$po_pro->feature_img_path}}"
                                                        alt=""></figure>
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-name"><span>{{$po_pro->name}}</span></a>
                                            <div class="wrap-price"><span
                                                    class="product-price">{{$po_pro->regular_price}}</span></div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div><!--end sitebar-->

            <div class="single-advance-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="wrap-show-advance-info-box style-1 box-in-site">
                    <h3 class="title-box">Related Products</h3>
                    <div class="wrap-products">
                        <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5"
                             data-loop="false" data-nav="true" data-dots="false"
                             data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}'>

                            @foreach($relate_product as $re_pro)
                                <div class="product product-style-2 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="detail.html" title="{{$re_pro->name}}">
                                            <figure><img
                                                    src="{{asset('assets/images/products/')}}/{{$re_pro->feature_img_path}}"
                                                    width="214" height="214" alt=""></figure>
                                        </a>
                                        <div class="group-flash">
                                            <span class="flash-item new-label">new</span>
                                        </div>
                                        <div class="wrap-btn">
                                            <a href="#" class="function-link">quick view</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>{{$re_pro->name}}</span></a>
                                        <div class="wrap-price"><span
                                                class="product-price">{{$re_pro->regular_price}}</span></div>
                                    </div>
                                </div>
                            @endforeach
                        </div><!--End wrap-products-->
                    </div>
                </div>

            </div><!--end row-->

        </div><!--end container-->

</main>
