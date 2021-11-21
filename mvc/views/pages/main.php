<div class="header-collection">
    <div class="title_all_product">ALL PRODUCT</div>
    <div class="collection">
        @foreach($collection_product as $key => $value)
        <div class="collection-item">
            <!-- <li><a href="#" title={{$value['title']}}>{{$value['title']}}</a></li> -->
        </div>
        @endforeach
    </div>
</div>
<div class="content-product-list">
    @foreach($product as $key => $value)
    <div class="pro-loop">
        <div class="product-block product-resize site-animation">
            <div class="product-img">
                @if($value->qualityProduct == 0)
                    <div class="sold-out"><img src="//theme.hstatic.net/1000351433/1000669365/14/sold_out.png?v=313"></div>
                @endif
                <a href="/products/{{$value->slug}}" title="{{$value->title}}" class="image-resize">
                    <img src="/upload/product/{{$value->image}}" alt={{$value->title}}>
                </a>
                <div class="pro-price-mb hidden-sm">
                    <span class="pro-price">{{number_format($value->price,0,'',',')}}<u class="format_d">đ</u></span>
                </div>
            </div>
            <div class="product-detail clearfix">
                <div class="box-pro-detail">
                    <h3 class="pro-name">
                        <li>
                            <a href="/products/{{$value->slug}}" title="{{$value->slug}}">
                                {{$value->title}}
                            </a>
                         </li>
                    </h3>
                </div>
                <div class="pro-price">
                    <span class="pro-price">{{number_format($value->price,0,'',',')}}<u class="format_d">đ</u></span>
                </div>
            </div>
            
        </div>
    </div>
    @endforeach

</div>
<!-- <div class="product_link">{{$product->links("vendor.pagination.default")}}</div> -->