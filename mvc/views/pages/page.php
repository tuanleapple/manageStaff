<script src='https://cdn.tiny.cloud/1/jbj33yr8pu29zao4xcpea8ejwxklfygv87xouuthxl8ops5e/tinymce/5/tinymce.min.js'referrerpolicy="origin"></script>
<div class="row product-info">
    <div class="col-lg-7 ">
        <div class="container1">
            @foreach(json_decode($product['list_image']) as $key => $value)
            <div class="mySlides zoom">
                <div class="numbertext hidden-sm">{{$key+1}} / {{count(json_decode($product['list_image']))}}</div>
                <img src="/upload/product/{{$value}}" style="padding: 0.25rem;" />
            </div>
            @endforeach
            <a class="prev" onclick="plusSlides(-1)">❮</a>
            <a class="next" onclick="plusSlides(1)">❯</a>
            <div class="row1">
                @foreach(json_decode($product['list_image']) as $key1 => $value)
                <div class="column">
                    <img class="demo cursor" src="/upload/product/{{$value}}" onclick="currentSlide({{$key1+1}})" />
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-lg-5 product-info-right">
        <div class="title">
            {{$product['title']}}
        </div>
        <div class="price" data-price="{{$product['price']}}">
            <span class="pro-price">{{number_format($product['price'],0,'',',')}}<u class="format_d">đ</u></span>
        </div>
        <div class="size swatch">
          <div class="select-swap-sm">
            @if(!empty($variant))
                @foreach ($variant as $key => $valsize)
                @if($valsize->quality == 0)
                <div class="select-wrap">
                    <div data-value="{{$valsize->title}}" class="n-sd swatch-element">
                        <label for="swatch-0-s" class="checksize soldout" data-value="{{$valsize->title}}">
                            <span>{{$valsize->title}}</span>
                        </label>
                    </div>
                </div> 
                @else
                <div class="select-wrap">
                    <div data-value="{{$valsize->title}}" class="n-sd swatch-element">
                        <label class="checksize notSoldOut" for="swatch-0-s" data-value="{{$valsize->title}}">
                            <span>{{$valsize->title}}</span>
                        </label>
                    </div>
                </div>
                @endif
                @endforeach  
            @endif
          </div>
        </div>
        @if(!empty($sum))
            @if($sum[0]['qualityProduct'] >= 1)
            <div class="number">
                <span class="minus">-</span><input class="quality" type="text" value="1"/><span class="plus">+</span>
            </div> @endif
         @endif
    
        <div class="wrap-addcart clearfix">
            @if(!empty($sum))
                @if($sum[0]['qualityProduct'] == 0)
                    <button type="button" class="button dark btn-addtocart addtocart-modal" name="add">Hết Hàng</button>
                    @else
                    <button type="button" id="add-to-cart" class="add-to-cartProduct button dark btn-addtocart addtocart-modal" name="add" data-id="{{$product['id']}}" data-slug="{{$product['slug']}}" >Thêm vào giỏ</button>
                @endif
            @endif
        </div>
        <div class="discription clearfix">						
            {!!$product->description !!}
        </div>
    </div>
</div>
<div class="list-productRelated">
  <div class="heading-title text-center">
    <h2>Sản phẩm liên quan</h2>
  </div>
  <div class="content-product-list">
    @foreach($productRelated as $key => $value)
    <div class="pro-loop">
        <div class="product-block product-resize site-animation">
            <div class="product-img">
                <a href="/products/{{$value['slug']}}" title="{{$value['title']}}" class="image-resize">
                    <img src="/upload/product/{{$value['image']}}" alt={{$value['title']}}>
                </a>
                <div class="pro-price-mb hidden-sm">
                    <span class="pro-price">{{number_format($value['price'],0,'',',')}}<u class="format_d">đ</u></span>
                </div>
            </div>
            <div class="product-detail clearfix">
                <div class="box-pro-detail">
                    <h3 class="pro-name">
                        <li>
                            <a href="/products/{{$value['slug']}}" title="{{$value['slug']}}">
                                {{$value['title']}}
                            </a>
                         </li>
                    </h3>
                </div>
                <div class="pro-price">
                    <span class="pro-price">{{number_format($value['price'],0,'',',')}}<u class="format_d">đ</u></span>
                </div>
            </div>
            
        </div>
    </div>
    @endforeach
</div>
</div>