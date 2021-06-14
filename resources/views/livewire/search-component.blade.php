<main id="main" class="main-site left-sidebar">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="{{ url('/') }}" class="link">home</a></li>
                <li class="item-link"><span>sản phẩm</span></li>
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

                    <h1 class="shop-title">Sản Phẩm</h1>

                    <div class="wrap-right">

                        <div class="sort-item orderby ">
                            <select name="orderby" class="use-chosen">
                                <option value="menu_order" selected="selected">Sắp xếp mặc định</option>
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

                    </div>

                </div><!--end wrap shop control-->
                @if($products->count() > 0)
                <div style="margin-top: 10px">
                 <p> <i>Tìm thây {{ $productsAll->count() }} sản phẩm</i></p>
                </div>
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
                        @else
                            <p class="text-center">Không tìm thấy sản phẩm</p>
                        @endif
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
                        </ul>
                    </div>
                </div>

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
                    </div><!-- brand widget-->
                </div>
            </div>
        </div><!--end sitebar-->
    </div><!--end row-->

    </div><!--end container-->

</main>
