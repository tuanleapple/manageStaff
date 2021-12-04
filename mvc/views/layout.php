<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="John Le">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="description" content="Free Web tutorials for HTML and CSS">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Angle and Devil store">
    <meta property="og:image:secure_url" content="https://theme.hstatic.net/1000351433/1000669365/14/share_fb_home.png?v=320">
    <meta property="og:image" content="http://theme.hstatic.net/1000351433/1000669365/14/share_fb_home.png?v=320">
    <meta property="og:description" content="Tất cả sản phẩm">
    <meta property="og:site_name" content="Angle and Devil store">
    <script src="https://kit.fontawesome.com/d5c2bf0a7a.js" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="./public/css/home.css" type="text/css"> -->
   <?php echo '<link rel="stylesheet" type="text/css" href="http://127.0.0.1:8080/public/css/home.css" />' ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>
    <title>Angle and Devil</title>
    <link rel="shortcut icon" href="https://zingnews.vn/favicon/v003/favicon_48x48.ico" />
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js"
        integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="http://127.0.0.1:8080/public/js/components/frontend/newCollection.js"></script>
</head>
<body>
    <div class="main-body">
        <div class="header-main">
            <div class="header">
                <div class="header-left">
                    <img src="http://127.0.0.1:8080/public/upload/header/logo_header.png" alt="logo">
                </div>
                <div class="header-right">
                    <span class="icon-facebook"><i class="fab fa-facebook-f"></i></span>
                    <span class="icon-instagram"><i class="fab fa-instagram"></i></span>
                    <span class="icon-account"><a href="/login"><i class="fas fa-user-circle"></i></a></span>
                    <span class="icon-cart" onclick="openpopup(2)"><i class="fas fa-shopping-cart count-shopping">
                    <?php if(!empty($data["cart"])) :?>
                            <div class="count-cart"><?= count($data["cart"])?></div>
                        <?php endif;?>
                        </i></span>
                    <span class="icon-menu"><i class="fas fa-bars"></i><span class="bar"></span></span>
                </div>
            </div>
            <div class="menu-main">
                <div class="menu-desktop">
                    <div class="nav-menu">
                        <ul class="clonemenu">
                            <?php foreach ($data["collection"] as $key => $value): ?>
                                    <li class="nav1">
                                        <a href="/new/<?= $value['id'] ?>"><?= $value['title'] ?></a>
                                    </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="search-main">
            <div class="seacher-product-main">
            </div>
        </div>
      
            <div class="breakcrumb-main">
                <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/">Trang chủ</a>
                        </li>
                    <?php if(!empty($data["type"])) :?>
                        <li class="breadcrumb-item">
                            <a href="#"><?= $data["type"] ?></a>
                        </li>
                    <?php endif;?>
                    <?php if(!empty($data["productTitle"])) :?>
                        <li class="breadcrumb-item">
                            <a href="/products/<?= $data["productTitle"]?>"><?= $data["productTitle"]?></a>
                        </li>
                    <?php endif;?>
                   
                </ol>
            </div>
          
  
      
        <div class="nav-main">
            <div class="main">
                <div class="zing-content">
                    <div class="container">
                        <?php require_once "./mvc/views/pages/".$data["Page"].".php" ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="top-footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-8">
                            <div class="area_newsletter">
                                <div class="title_newsletter">
                                    <h4>Đăng kí nhận tin</h4>
                                </div>
                                <div class="form_newsletter"> 
                                    <form accept-charset="UTF-8" action="/account/contact" class="contact-form" method="post">
                                    <input name="form_type" type="hidden" value="customer">
                                    <input name="utf8" type="hidden" value="✓">
                                    <div class="input-group">
                                        <input type="hidden" id="contact_tags" name="contact[tags]" value="khách hàng tiềm năng, bản tin">     
                                        <input required="" type="email" value="" placeholder="Nhập email của bạn" name="contact[email]" aria-label="Email Address">
                                        <button type="submit" class="button dark">Đăng kí</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4">
                            <div class="area_phone_contact">
                                <p class="number_phone">
                                    <i class="fa fa-phone "></i>
                                    <span>Hỗ trợ / Mua hàng:</span>
                                    <a href="#">
                                    0984946840
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg">
                            <div class="footer-col">
                                <h4 class="footer-title">
                                    Thông tin liên hệ
                                </h4>
                                <div class="footer-content footer-contact">
                                    <ul>
                                        <li class="contact-1"><span><i class="fas fa-store"></i></span> Hệ thống cửa hàng:
                                            <br>Store 1: số 7 đường số 5 phường 17 quận Gò Vấp
                                            </li>
                                        <li class="contact-2"><span><i class="fas fa-phone-volume"></i></span> 0907 799 384 - 0902 638 020</li>
                                        <li class="contact-3"><span><i class="fas fa-envelope-open"></i></span> badhabits95.store@gmail.com</li>
                                    </ul>	
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg">
                            <div class="footer-col">
                                <h4 class="footer-title">
                                    FOLLOW FANPAGE 
                                </h4>
                                <div class="footer-content footer-contact">						
                           
                                </div>
                            </div>
                        </div>             
                        <div class="col-xs-12 col-sm-6 col-md-2 col-lg">
                            <div class="footer-col footer-block">
                                <h4 class="footer-title">
                                    FOLLOW INSTA
                                </h4>
                                <div class="footer-content toggle-footer">
                                    <ul>
                                        
                                        <li class="item">
                                            <a href="#" title="BAD HABITS">BAD HABITS</a>
                                        </li>
                                        
                                        <li class="item">
                                            <a href="#" title="BAD RABBIT">BAD RABBIT</a>
                                        </li>
                                            
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="item_be"></div>
            <div class="bottom-footer text-center">
                <div class="container-fluid">
                    <p>Copyright © 2021 <a href="https://angleadevilstore.vn"> Angle and Devil store</a>. <a target="_blank" href="">Powered by JoihLe</a></p>
                </div>
            </div>
        </div>
    </div>
    <div class="site-nav style--sidebar">
        <div id="site-seach" class="site-container-moblie hidden-sm">
            <div class="container-seach">
                <div class="site-title-seach">Tìm kiếm</div>
                <button type="button" class="site-exit" id="site-exit" class="site-exit" data-type="1">x</button>
            </div>
            <div class="site-nav-seach">
                <input type="text" id="keyword" class="search-auto" placeholder="Tìm Kiếm Sản Phẩm ..">
                <p class="mb-0" onclick=""><i class="fas fa-search"></i></p>
            </div>
            <div class="result-sreach">
            </div>
        </div>
        <div id="site-cart" class="site-container-moblie s hidden-sm">
            <div class="container-seach">
                <div class="site-title-seach">GIỎ HÀNG</div>
                <button type="button" class="site-exit" id="site-exit" class="site-exit" data-type="2">x</button>
            </div>
            <div class="cart-view clearfix">
                <div class="cart-product">
                    <?php if (!empty($data['cart'])) :?>
                        <?php foreach ($data['cart'] as $valueCart) :?>
                            <table id="cart-view" class="table text-center border-table cart_<?= $valueCart['id']?>"><tbody><tr class="item_2">
                                <td class="img"><a href="/products/<?= $valueCart['slug']?>" title="/products/<?= $valueCart['slug']?>"><img src="http://127.0.0.1:8080/public/upload/product/<?= $valueCart['image']?>" alt="/products/<?= $valueCart['slug']?>"></a></td>
                                <td class="table-product-p">
                                    <a class="pro-title-view" href="/products/<?= $valueCart['slug']?>" title="/products/<?= $valueCart['slug']?>"><?= $valueCart['title']?></a>
                                    <span class="variant"><?= $valueCart['size']?></span>	
                                    <span class="pro-quantity-view"><?= $valueCart['quality']?></span>
                                    <span class="pro-price-view" data-price="<?= $valueCart['price']?>"><?= number_format($valueCart['price'],0,'',',')?><u class="format_d">đ</u></span>
                                    <span class="remove_link remove-cart"><a onclick="deleteCart(<?= $valueCart['id']?>)" ><i class="fa fa-times"></i></a></span>				
                                </td>
                            </tr></tbody></table>
                        <?php endforeach;?>
                    <?php else :?>
                </div>
                <table id="cart-view" class="table text-center border-table"><tbody><tr class="item_2">
                    <td class="table-product-p">
                        Hiện Tại Chưa Có Sản Phẩm
                    </td>
                </tr></tbody></table> 
                <?php endif;?>
				<span class="line"></span>
				<table class="table-total table border-table">
					<tbody><tr>
						<td class="text-left">TỔNG TIỀN:</td>
						<td class="text-right" id="total-view-cart"></td>
					</tr>
					<tr>
						<td><a href="/cart" class="linktocart button dark">Xem giỏ hàng</a></td>
						<td><a href="/checkouts" class="linktocheckout button dark">Thanh toán</a></td>
					</tr>
				</tbody></table>
			</div>
        </div>
    </div>
    </div>
    <div id="site-overlay" class="site-overlay"></div>
</body>
</html>
