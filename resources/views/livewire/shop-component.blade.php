<main id="main" class="main-site left-sidebar">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">home</a></li>
                <li class="item-link"><span>Shop</span></li>
            </ul>
        </div>
        <div class="row">

            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">

                <div class="banner-shop">
                    <a href="#" class="banner-link">
                        <figure><img src="assets/images/shop-banner.jpg" alt=""></figure>
                    </a>
                </div>

                <div class="wrap-shop-control">

                    <h1 class="shop-title">Shop</h1>

                    <div class="wrap-right">

                        <div class="sort-item orderby ">
                            <select name="orderby" class="use-chosen">
                                <option value="menu_order" selected="selected">Sắp xếp mặc định</option>
                                {{--                                <option value="popularity">Sort by popularity</option>--}}
                                {{--                                <option value="rating">Sort by average rating</option>--}}
                                {{--                                <option value="date">Sort by newness</option>--}}
                                <option value="price">Sắp xếp giá cao -> thấp</option>
                                <option value="price-desc">Sắp xếp giá thấp -> cao</option>
                            </select>
                        </div>

                        <div class="sort-item product-per-page">
                            <select name="post-per-page" class="use-chosen">
                                <option value="12" selected="selected">12 sản phẩm</option>
                                <option value="16">16 sản phẩm</option>
                                <option value="18">18 sản phẩm</option>
                            </select>
                        </div>

                        {{--                        <div class="change-display-mode">--}}
                        {{--                            <a href="#" class="grid-mode display-mode active"><i class="fa fa-th"></i>Grid</a>--}}
                        {{--                            <a href="list.html" class="list-mode display-mode"><i class="fa fa-th-list"></i>List</a>--}}
                        {{--                        </div>--}}

                    </div>

                </div><!--end wrap shop control-->

                <div class="row">

                    <ul class="product-list grid-products equal-container">
                        @foreach($products as $pro)
                            <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
                                <div class="product product-style-3 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="{{route('product.detail', ['slug'=>$pro->slug])}}"
                                           title="{{ $pro->name }}">
                                            <figure><img src="{{asset('storage/'. $pro->feature_img_path)}}"
                                                         alt="{{ $pro->name }}"></figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="{{route('product.detail', ['slug'=>$pro->slug])}}"
                                           class="product-name"><span>{{$pro->name}}</span></a>
                                        <div class="wrap-price"><span class="product-price"> @if($pro->sale_price > 0)
                                                    <ins><p class="product-price">{{ number_format($pro->sale_price , 0, '.', '.')  }}</p></ins>
                                                    <del><p class="product-price">{{ number_format($pro->regular_price , 0, '.', '.')  }}</p></del>
                                                @else
                                                    <ins><p class="product-price">{{ number_format($pro->regular_price , 0, '.', '.')  }}</p></ins>
                                                @endif</span></div>
                                        <a href="#" class="btn add-to-cart">Add To Cart</a>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>

                </div>

                <div class="wrap-pagination-info">
                    {{ $products->links() }}
                </div>
            </div><!--end main products area-->

            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
                <div class="widget mercado-widget categories-widget">
                    <h2 class="widget-title">DANH MỤC</h2>
                    <div class="widget-content">
                        <ul class="list-category">
                            @foreach($categories as $cate)
                                <li class="category-item text-uppercase">
                                    <a href="#" class="cate-link">{{ $cate->name }}</a>
                                </li>
                            @endforeach
                            {{--                            <li class="category-item has-child-cate">--}}
                            {{--                                <a href="#" class="cate-link">Furnitures & Home Decors</a>--}}
                            {{--                                <span class="toggle-control">+</span>--}}
                            {{--                                <ul class="sub-cate">--}}
                            {{--                                    <li class="category-item"><a href="#" class="cate-link">Batteries (22)</a></li>--}}
                            {{--                                    <li class="category-item"><a href="#" class="cate-link">Headsets (16)</a></li>--}}
                            {{--                                    <li class="category-item"><a href="#" class="cate-link">Screen (28)</a></li>--}}
                            {{--                                </ul>--}}
                            {{--                            </li>--}}

                            {{--                            <li class="category-item">--}}
                            {{--                                <a href="#" class="cate-link">Organics & Spa</a>--}}
                            {{--                            </li>--}}
                        </ul>
                    </div>
                </div>
                <!-- Categories widget-->

                {{--                <div class="widget mercado-widget filter-widget price-filter">--}}
                {{--                    <h2 class="widget-title">Price</h2>--}}
                {{--                    <div class="widget-content">--}}
                {{--                        <div id="slider-range"></div>--}}
                {{--                        <p>--}}
                {{--                            <label for="amount">Price:</label>--}}
                {{--                            <input type="text" id="amount" readonly>--}}
                {{--                            <button class="filter-submit">Filter</button>--}}
                {{--                        </p>--}}
                {{--                    </div>--}}
                {{--                </div>
                <!-- Price-->--}}

{{--                <div class="widget mercado-widget filter-widget">--}}
{{--                    <h2 class="widget-title">Color</h2>--}}
{{--                    <div class="widget-content">--}}
{{--                        <ul class="list-style vertical-list has-count-index">--}}
{{--                            <li class="list-item"><a class="filter-link " href="#">Red <span>(217)</span></a></li>--}}
{{--                            <li class="list-item"><a class="filter-link " href="#">Yellow <span>(179)</span></a></li>--}}
{{--                            <li class="list-item"><a class="filter-link " href="#">Black <span>(79)</span></a></li>--}}
{{--                            <li class="list-item"><a class="filter-link " href="#">Blue <span>(283)</span></a></li>--}}
{{--                            <li class="list-item"><a class="filter-link " href="#">Grey <span>(116)</span></a></li>--}}
{{--                            <li class="list-item"><a class="filter-link " href="#">Pink <span>(29)</span></a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div><!-- Color -->--}}

{{--                <div class="widget mercado-widget filter-widget">--}}
{{--                    <h2 class="widget-title">Size</h2>--}}
{{--                    <div class="widget-content">--}}
{{--                        <ul class="list-style inline-round ">--}}
{{--                            <li class="list-item"><a class="filter-link active" href="#">s</a></li>--}}
{{--                            <li class="list-item"><a class="filter-link " href="#">M</a></li>--}}
{{--                            <li class="list-item"><a class="filter-link " href="#">l</a></li>--}}
{{--                            <li class="list-item"><a class="filter-link " href="#">xl</a></li>--}}
{{--                        </ul>--}}
{{--                        <div class="widget-banner">--}}
{{--                            <figure><img src="assets/images/size-banner-widget.jpg" width="270" height="331" alt="">--}}
{{--                            </figure>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div><!-- Size -->--}}

                <div class="widget mercado-widget widget-product">
                    <h2 class="widget-title">Sản phẩm phổ biến</h2>
                    <div class="widget-content">
                        <ul class="products">
                            <li class="product-item">
                                <div class="product product-widget-style">
                                    <div class="thumbnnail">
                                        <a href="detail.html"
                                           title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                            <figure><img src="assets/images/products/digital_1.jpg" alt=""></figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker...</span></a>
                                        <div class="wrap-price"><span class="product-price">$168.00</span></div>
                                    </div>
                                </div>
                            </li>

                            <li class="product-item">
                                <div class="product product-widget-style">
                                    <div class="thumbnnail">
                                        <a href="detail.html"
                                           title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                            <figure><img src="assets/images/products/digital_17.jpg" alt=""></figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker...</span></a>
                                        <div class="wrap-price"><span class="product-price">$168.00</span></div>
                                    </div>
                                </div>
                            </li>

                            <li class="product-item">
                                <div class="product product-widget-style">
                                    <div class="thumbnnail">
                                        <a href="detail.html"
                                           title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                            <figure><img src="assets/images/products/digital_18.jpg" alt=""></figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker...</span></a>
                                        <div class="wrap-price"><span class="product-price">$168.00</span></div>
                                    </div>
                                </div>
                            </li>

                            <li class="product-item">
                                <div class="product product-widget-style">
                                    <div class="thumbnnail">
                                        <a href="detail.html"
                                           title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                            <figure><img src="assets/images/products/digital_20.jpg" alt=""></figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker...</span></a>
                                        <div class="wrap-price"><span class="product-price">$168.00</span></div>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div><!-- brand widget-->

            </div><!--end sitebar-->

        </div><!--end row-->

    </div><!--end container-->

</main>
