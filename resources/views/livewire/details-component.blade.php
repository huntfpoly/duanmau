<main id="main" class="main-site">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">home</a></li>
                <li class="item-link"><a href="{{ url('/shop') }}" class="link">sản phẩm</a></li>
                <li class="item-link"><span>{{ $product->name }}</span></li>
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
                        <h2 class="product-name text-uppercase">{{$product->name}}</h2>
                        <div class="wrap-social">
                            <a class="link-socail" href="#"><img src="assets/images/social-list.png" alt=""></a>
                        </div>
                        <div class="wrap-price"><span
                                class="product-price">{{number_format($product->regular_price, 0, '.', '.')}}</span>
                        </div>
                        <div class="quantity">
                            <span>Số lượng:</span>
                            <div class="quantity-input">
                                <input type="text" name="product-quatity" value="1" data-max="120" pattern="[0-9]*">

                                <a class="btn btn-reduce" href="#"></a>
                                <a class="btn btn-increase" href="#"></a>
                            </div>
                        </div>
                        <div class="wrap-butons">
                            <a href="#" class="btn add-to-cart"
                               wire:click.prevent="store({{ $product->id}}, '{{ $product->name }}' , {{ $product->regular_price }})">Add
                                to Cart</a>
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
                                        <span class="subtitle">Miễn phí từ đơn hàng 500.000đ</span>
                                    </div>
                                </a>
                            </li>

                            <li class="service">
                                <a class="link-to-service" href="#">
                                    <i class="fa fa-gift" aria-hidden="true"></i>
                                    <div class="right-content">
                                        <b class="title">Ưu đãi đặc biệt</b>
                                        <span class="subtitle">Nhận quà ngay</span>
                                    </div>
                                </a>
                            </li>

                            <li class="service">
                                <a class="link-to-service" href="#">
                                    <i class="fa fa-reply" aria-hidden="true"></i>
                                    <div class="right-content">
                                        <b class="title">Đổi - Trả hàng</b>
                                        <span class="subtitle">Đổi - trả trong vòng 7 ngày</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div><!-- Categories widget-->

                <div class="widget mercado-widget widget-product">
                    <h2 class="widget-title">Sản phẩm phổ biến</h2>
                    <div class="widget-content">
                        <ul class="products">
                            @foreach($popular_product as $po_pro)
                                <li class="product-item">
                                    <div class="product product-widget-style">
                                        <div class="thumbnnail">
                                            <a href="{{ route('product.detail', ['slug' => $po_pro->slug]) }}"
                                               title="">
                                                <figure><img
                                                        src="{{ asset('storage/' . $po_pro->feature_img_path) }}"
                                                        alt=""></figure>
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <a href="{{ route('product.detail', ['slug' => $po_pro->slug]) }}"
                                               class="product-name"><span>{{$po_pro->name}}</span></a>
                                            <div class="wrap-price"><span
                                                    class="product-price">{{ number_format($po_pro->regular_price, 0, '.', '.') }}</span>
                                            </div>
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
                    <h3 class="title-box">Sản phẩm liên quan</h3>
                    <div class="wrap-products">
                        <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5"
                             data-loop="false" data-nav="true" data-dots="false"
                             data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}'>

                            @foreach($relate_product as $re_pro)
                                <div class="product product-style-2 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="{{ route('product.detail', ['slug' => $re_pro->slug]) }}"
                                           title="{{$re_pro->name}}">
                                            <figure><img
                                                    src="{{ asset('storage/' . $re_pro->feature_img_path) }}"
                                                    width="214  " height="214" alt=""></figure>
                                        </a>
                                        <div class="wrap-btn">
                                            <a href="#" class="function-link">quick view</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="{{ route('product.detail', ['slug' => $po_pro->slug]) }}"
                                           class="product-name"><span>{{$re_pro->name}}</span></a>
                                        <div class="wrap-price"><span
                                                class="product-price">{{ number_format($re_pro->regular_price, 0, '.', '.') }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div><!--End wrap-products-->
                    </div>
                </div>

            </div><!--end row-->

        </div><!--end container-->

</main>
