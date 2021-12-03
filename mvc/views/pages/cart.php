
<link rel="stylesheet" href="/public/css/cart.css" type="text/css">
<div class="row pd-page">
    <div class="col-md-12 col-xs-12 heading-page">
       
        <div class="header-page">
            <h1>Giỏ hàng của bạn</h1>
            <?php if(count($data['cart']) > 0) :?>
                <p class="count-cart">Có <span><?= count($data['cart']) ?> sản phẩm</span> trong giỏ hàng</p>
            <?php else :?>
                <p class="count-cart">Có <span>0 sản phẩm</span> trong giỏ hàng</p>
                <a class="button dark link-continue" href="/" title="Tiếp tục mua hàng"><i class="fa fa-reply"></i>Tiếp tục mua hàng</a>
            <?php endif;?>
        </div>
    </div>
    <div class="col-md-12 col-xs-12 wrapbox-content-cart">
        <div class="cart-container">
            <div class="cart-col-left">
                <div class="main-content-cart">
                    <form action="/cart" method="post" id="cartformpage">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <?php if(count($data['cart']) > 0) :?>
                                    <?php foreach($data['cart'] as $value) :?>
                                    <table class="table-cart border-table cart_<?= $value['id'] ?>" >
                                        <thead>
                                            <tr>
                                                <th class="image">&nbsp;</th>
                                                <th class="item">Tên sản phẩm</th>
                                                <th class="remove">&nbsp;</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="line-item-container" data-variant-id="<?= $value['id'] ?>">
                                                <td class="image">
                                                    <div class="product_image">
                                                        <a href="/products/<?= $value['slug'] ?>">
                                                            <img src="http://127.0.0.1:8080/public/upload/product/<?= $value['image'] ?>" alt="<?= $value['title'] ?>">
                                                        </a>
                                                    </div>
                                                </td>
                                                <td class="item">
                                                    <a href="/products/<?= $value['slug'] ?>">
                                                        <h3><?= $value['title'] ?></h3>
                                                    </a>
                                                    <p>
                                                        <span><?= number_format($value['price'],0,'',',') ?></span><u>đ</u>
                                                    </p>
                                                    <p class="variant">                       
                                                        <span class="variant_title"><?= $value['size'] ?></span>
                                                    </p>
                                                    <div class="qty quantity-partent qty-click clearfix">
                                                        <button type="button" class="qtyminus qty-btn minus">-</button>
                                                        <input type="text" name="quality" value="<?= $value['quality'] ?>" data-id="<?= $value['id'] ?>" data-price="<?= $value['price'] ?>" class="tc line-item-qty item-quantity">
                                                        <button type="button" class="qtyplus qty-btn plus">+</button>
                                                    </div>
                                                    <p class="price">
                                                        <span class="text">Thành tiền:</span>
                                                        <span class="line-item-total" data-totalPrice="<?= (int)$value['price'] * (int)$value['quality'] ?>" ><?= number_format((int)$value['price'] * (int)$value['quality'],0,'',',') ?></span><u>đ</u>
                                                    </p>
                                                </td>
                                                <td class="remove">
                                                    <a class="cart" onclick="deleteCart(<?= $value['id'] ?>)">
                                                        <img src="//theme.hstatic.net/1000351433/1000669365/14/ic_close.png?v=313"></a>
                                                </td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                    <?php endforeach;?>
                                </div>
                            <?php endif;?>
                            <?php if(count($data['cart']) > 0) :?>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="checkout-note clearfix">
                                        <textarea id="note" name="note" rows="8" cols="50" placeholder="Ghi chú"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12 text-right">
                                    <p class="order-infor">					
                                        Tổng tiền:
                                        <span class="total_price"><b></b><u>đ</u></span>
                                    </p>
                                    <div class="cart-buttons">
                                        <a class="button dark link-continue" href="/collections/all" title="Tiếp tục mua hàng"><i class="fa fa-reply"></i>Tiếp tục mua hàng</a>
                                        <a class="button dark link-continue" href="/cart" title="Cập nhật"><i class="fa fa-spinner"></i>Cập nhật</a>
                                        <a class="button dark link-continue" href="/checkouts" title="Thanh toán"></i>Thanh toán</a>
                                    </div>
                                </div>
                            <?php endif;?>
                        </div>
                    </form>
                </div>
            </div>				
        </div>
    </div>
</div>

<script type="text/javascript" src="http://127.0.0.1:8080/public/js/components/frontend/cart.js"></script>
