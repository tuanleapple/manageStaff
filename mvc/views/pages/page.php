<script src='https://cdn.tiny.cloud/1/jbj33yr8pu29zao4xcpea8ejwxklfygv87xouuthxl8ops5e/tinymce/5/tinymce.min.js'referrerpolicy="origin"></script>
<div class="row product-info">
    <div class="col-lg-7 ">
        <div class="container1">
            <?php foreach(json_decode($data['productInfo']['list_image']) as $key => $value) :?>
            <div class="mySlides zoom">
                <div class="numbertext hidden-sm"><?= $key+1 ?> / <?= count(json_decode($data['productInfo']['list_image']));?></div>
                <img src="http://127.0.0.1:8080/public/upload/product/<?= $value;?>" style="padding: 0.25rem;" />
            </div>
            <?php endforeach;?>
            <a class="prev" onclick="plusSlides(-1)">❮</a>
            <a class="next" onclick="plusSlides(1)">❯</a>
            <div class="row1">
            <?php foreach(json_decode($data['productInfo']['list_image']) as $key1 => $value) :?>
                <div class="column">
                    <img class="demo cursor" src="http://127.0.0.1:8080/public/upload/product/<?= $value;?>" onclick="currentSlide(<?= $key1+1;?>)" />
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
    <div class="col-lg-5 product-info-right">
        <div class="title">
        <?php echo($data['productInfo']['title']);?>
        </div>
        <div class="price" data-price="<?= $data['productInfo']['price']; ?>" >
            <span class="pro-price"><?php echo(number_format($data['productInfo']['price'],0,'',','));?><u class="format_d">đ</u></span>
        </div>
        <div class="size swatch">
          <div class="select-swap-sm">
            <?php foreach($data['variant'] as $key => $valsize) :?>
                <?php if($valsize['quality']== 0) :?>
                <div class="select-wrap">
                    <div data-value="<?= $valsize['title']?>" class="n-sd swatch-element">
                        <label for="swatch-0-s" class="checksize soldout" data-value="<?= $valsize['title']?>">
                            <span><?= $valsize['title']?></span>
                        </label>
                    </div>
                </div> 
                <?php else:?>
                <div class="select-wrap">
                    <div data-value="<?= $valsize['title']?>" class="n-sd swatch-element">
                        <label class="checksize notSoldOut" for="swatch-0-s" data-value="<?= $valsize['title']?>">
                            <span><?= $valsize['title']?></span>
                        </label>
                    </div>
                </div>
                <?php endif;?>
                <?php endforeach;?>
          </div>
        </div>
        <?php if($data['productInfo']['qualityProduct'] != 0) : ?>	
            <div class="number">
                <span class="minus">-</span><input class="quality" type="text" value="1"/><span class="plus">+</span>
            </div>
        <?php endif;?>
        <div class="wrap-addcart clearfix">
            <?php if($data['productInfo']['qualityProduct'] == 0) : ?>	
                    <button type="button" class="button dark btn-addtocart addtocart-modal" name="add">Hết Hàng</button>
                    <?php else :?>	
                    <button type="button" id="add-to-cart" class="add-to-cartProduct button dark btn-addtocart addtocart-modal" name="add" data-id="<?= $data['productInfo']['id'];?>" data-slug="<?= $data['productInfo']['slug'];?>" >Thêm vào giỏ</button>
            <?php endif;?>	
        </div>
        <div class="discription clearfix">				
        <?php echo($data['productInfo']['description']);?>
        </div>
    </div>
</div>
<div class="list-productRelated">
  <div class="heading-title text-center">
    <h2>Sản phẩm liên quan</h2>
  </div>
  <div class="content-product-list">
  <?php foreach($data['productRelated'] as $key => $value) :?>
    <div class="pro-loop">
        <div class="product-block product-resize site-animation">
            <div class="product-img">
                <a href="/products/<?= $value['slug']?>" title="<?= $value['slug']?>" class="image-resize">
                    <img src="http://127.0.0.1:8080/public/upload/product/<?= $value['image']?>" alt=<?= $value['title']?>>
                </a>
                <div class="pro-price-mb hidden-sm">
                    <span class="pro-price"><?= number_format($value['price'],0,'',',')?><u class="format_d">đ</u></span>
                </div>
            </div>
            <div class="product-detail clearfix">
                <div class="box-pro-detail">
                    <h3 class="pro-name">
                        <li>
                            <a href="/products/<?= $value['slug']?>" title="<?= $value['slug']?>">
                                <?= $value['title']?>
                            </a>
                         </li>
                    </h3>
                </div>
                <div class="pro-price">
                    <span class="pro-price"><?= number_format($value['price'],0,'',',')?><u class="format_d">đ</u></span>
                </div>
            </div>
            
        </div>
    </div>
    <?php endforeach;?>
</div>
<script type="text/javascript" src="http://127.0.0.1:8080/public/js/zoom/jquery.zoom.js"></script>
<script type="text/javascript" src="http://127.0.0.1:8080/public/js/components/product_info.js"></script>