<main id="main">
{{--        @livewire('comments')--}}
{{--    @foreach($comment as $cmt)--}}
{{--        echo 2;--}}
{{--    @endforeach--}}
{{--        <livewire:comments :cmt=" $comment "/>--}}
    <div class="container">
        <!--MAIN SLIDE-->
        <div class="wrap-main-slide">
            <div class="slide-carousel owl-carousel style-nav-1" data-items="1" data-loop="1" data-nav="true"
                 data-dots="false">
                @foreach($sliders as $slider)
                <div class="item-slide">
                    <img src="{{ asset('storage/'. $slider->image) }}" alt="" class="img-slide">
                    <div class="slide-info slide-1">
                        <h2 class="f-title">Mua ngay <b>Công nghệ</b></h2>
                        <span class="subtitle">Sản phẩm mới nhất</span>
                        <p class="sale-info">Chỉ từ: <span class="price">1.200.000</span></p>
                        <a href="#" class="btn-link">Mua ngay</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!--BANNER-->
        <div class="wrap-banner style-twin-default">
            <div class="banner-item">
                <a href="#" class="link-banner banner-effect-1">
                    <figure><img src="{{ asset('assets/images/home-1-banner-1.jpg') }}" alt="" width="580" height="190">
                    </figure>
                </a>
            </div>
            <div class="banner-item">
                <a href="#" class="link-banner banner-effect-1">
                    <figure><img src="{{ asset('assets/images/home-1-banner-2.jpg') }}" alt="" width="580" height="190">
                    </figure>
                </a>
            </div>
        </div>

        <!--On Sale-->
        <div class="wrap-show-advance-info-box style-1 has-countdown">
            <h3 class="title-box"> Giảm giá</h3>
            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container " data-items="5"
                 data-loop="false" data-nav="true" data-dots="false"
                 data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                @foreach($sale_products as $pro)
                <div class="product product-style-2 equal-elem ">
                    <div class="product-thumnail">
                        <a href="{{ route('product.detail', ['slug' => $pro->slug]) }}" title="">
                            <figure><img src="{{ asset('storage/' . $pro->feature_img_path) }}" width="800"
                                         height="800" alt=""></figure>
                        </a>
                        <div class="group-flash">
                            @if($pro->sale_price)
                            <span class="flash-item sale-label">{{ 100- number_format(($pro->sale_price/$pro->regular_price)*100,2,'.','.') }} %    </span>
                            @endif
                        </div>
                        <div class="wrap-btn">
                            <a href="#"  class="function-link">thêm giỏ hàng</a>
                        </div>

                    </div>
                    <div class="product-info">
                        <a href="#"
                           class="product-name"><span>{{$pro->name}}</span></a>
                        <div class="wrap-price">
                            @if($pro->sale_price > 0)
                                <ins><p class="product-price">{{ number_format($pro->sale_price , 0, '.', '.')  }}</p></ins>
                                <del><p class="product-price">{{ number_format($pro->regular_price , 0, '.', '.')  }}</p></del>
                            @else
                                <ins><p class="product-price">{{ number_format($pro->regular_price , 0, '.', '.')  }}</p></ins>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>

        <!--Latest Products-->
        <div class="wrap-show-advance-info-box style-1">
            <h3 class="title-box">Sản phẩm mới nhất</h3>
            <div class="wrap-top-banner">
                <a href="#" class="link-banner banner-effect-2">
                    <figure><img src="{{ asset('assets/images/digital-electronic-banner.jpg') }}" width="1170"
                                 height="240" alt=""></figure>
                </a>
            </div>
            <div class="wrap-products">
                <div class="wrap-product-tab tab-style-1">
                    <div class="tab-contents">
                        <div class="tab-content-item active" id="digital_1a">
                            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container"
                                 data-items="5" data-loop="false" data-nav="true" data-dots="false"
                                 data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>

                                @foreach($new_products as $pro)
                                <div class="product product-style-2 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="{{ route('product.detail', ['slug' => $pro->slug]) }}" title="{{ $pro->name }}">
                                            <figure><img src="{{ asset('storage/' . $pro->feature_img_path) }}"
                                                         width="800" height="800" alt="{{ $pro->name }}"></figure>
                                        </a>
                                        <div class="group-flash">
                                            <span class="flash-item new-label">mới</span>
                                            @if($pro->sale_price > 0)
                                            <span class="flash-item sale-label">sale</span>
                                            @endif
                                        </div>
                                        <div class="wrap-btn">
                                            <a href="{{ route('product.detail', ['slug' => $pro->slug]) }}" class="function-link">thêm giỏ hàng</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                        <div class="wrap-price">
                                            @if($pro->sale_price > 0)
                                                <ins><p class="product-price">{{ number_format($pro->sale_price , 0, '.', '.')  }}</p></ins>
                                                <del><p class="product-price">{{ number_format($pro->regular_price , 0, '.', '.')  }}</p></del>
                                            @else
                                                <ins><p class="product-price">{{ number_format($pro->regular_price , 0, '.', '.')  }}</p></ins>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                    @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</main>
