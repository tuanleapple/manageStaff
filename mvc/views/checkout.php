<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CHECKOUT</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="/public/css/checkout.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js"
        integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous"></script>
    <script type="text/javascript" src="/public/js/components/frontend/checkout.js"></script>
</head>

<body>
    <div class="content">
        <div class="wrap">
            <div class="sidebar">
                <div class="sidebar-content">
                    <div class="order-summary order-summary-is-collapsed">
                        <h2 class="visually-hidden">Thông tin đơn hàng</h2>
                        <div class="order-summary-sections">
                            <div class="order-summary-section order-summary-section-product-list"
                                data-order-summary-section="line-items">
                                <?php foreach ($data['cart'] as $value):?>
                                        <table class="product-table">
                                            <thead>
                                                <tr>
                                                    <th scope="col"><span class="visually-hidden">Hình ảnh</span></th>
                                                    <th scope="col"><span class="visually-hidden">Mô tả</span></th>
                                                    <th scope="col"><span class="visually-hidden">Số lượng</span></th>
                                                    <th scope="col"><span class="visually-hidden">Giá</span></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="product" data-product="<?= $value['product_id']?>" data-cart="<?= $value['id']?>">
                                                    <td class="product-image">
                                                        <div class="product-thumbnail">
                                                            <div class="product-thumbnail-wrapper">
                                                                <img class="product-thumbnail-image" alt="{{$value['title']}}"
                                                                    src="http://127.0.0.1:8080/public/upload/product/<?= $value['image']?>" alt="/products/<?= $value['slug']?>">
                                                            </div>
                                                            <span class="product-thumbnail-quantity" aria-hidden="true"><?= $value['quality']?></span>
                                                        </div>
                                                    </td>
                                                    <td class="product-description">
                                                        <span class="product-description-name order-summary-emphasis"><?= $value['title']?></span>
                                                        <span class="product-description-variant order-summary-small-text">
                                                            <?= $value['size']?>
                                                        </span>
                                                    </td>
                                                    <td class="product-quantity visually-hidden"><?= $value['quality']?></td>
                                                    <td class="product-price">
                                                        <span class="order-summary-emphasis"><?= number_format($value['price'],0,'',',')?></span><u>đ</u>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    <?php endforeach;?>
                            </div>
                            <div class="order-summary-section order-summary-section-discount"
                                data-order-summary-section="discount">
                                <form id="form_discount_add" accept-charset="UTF-8" method="post">
                                    <input name="utf8" type="hidden" value="✓">
                                    <div class="fieldset">
                                        <div class="field  ">
                                            <div class="field-input-btn-wrapper">
                                                <div class="field-input-wrapper">
                                                    <label class="field-label" for="discount.code">Mã giảm giá</label>
                                                    <input placeholder="Mã giảm giá" class="field-input"
                                                        data-discount-field="true" autocomplete="off"
                                                        autocapitalize="off" spellcheck="false" size="30" type="text"
                                                        id="discount.code" name="discount.code" value="">
                                                </div>
                                                <button type="submit"
                                                    class="field-input-btn btn btn-default btn-disabled">
                                                    <span class="btn-content">Sử dụng</span>
                                                    <i class="btn-spinner icon icon-button-spinner"></i>
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="order-summary-section order-summary-section-redeem redeem-login-section"
                                data-order-summary-section="discount">
                                <div class="redeem-login">
                                    <div class="redeem-login-title">
                                        <h2>Khách hàng thân thiết</h2>
                                        <i class="btn-redeem-spinner icon-redeem-button-spinner"></i>
                                    </div>
                                    <div class="redeem-login-btn">
                                        <a
                                            href="/login">Đăng
                                            nhập</a>
                                    </div>
                                </div>
                            </div>
                            <div class="order-summary-section order-summary-section-total-lines payment-lines"
                                data-order-summary-section="payment-lines">
                                <table class="total-line-table">
                                    <thead>
                                        <tr>
                                            <th scope="col"><span class="visually-hidden">Mô tả</span></th>
                                            <th scope="col"><span class="visually-hidden">Giá</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="total-line total-line-subtotal">
                                            <td class="total-line-name">Tạm tính</td>
                                            <td class="total-line-price">
                                                <span class="order-summary-emphasis"
                                                data-checkout-subtotal-price-target={{$total}}>
                                                <?= number_format($data['total'],0,'',',')?>
                                                </span><u>đ</u>
                                            </td>
                                        </tr>
                                        <tr class="total-line total-line-shipping">
                                            <td class="total-line-name">Phí vận chuyển</td>
                                            <td class="total-line-price">
                                                <span class="order-summary-emphasis"
                                                    data-checkout-total-shipping-target="0">
                                                    —
                                                </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot class="total-line-table-footer">
                                        <tr class="total-line">
                                            <td class="total-line-name payment-due-label">
                                                <span class="payment-due-label-total">Tổng cộng</span>
                                            </td>
                                            <td class="total-line-name payment-due">
                                                <span class="payment-due-currency">VND</span>
                                                <span class="payment-due-price"
                                                    data-checkout-payment-due-target="<?= $data['total']?>">
                                                    <?= number_format($data['total'],0,'',',')?>
                                                </span><u>đ</u>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main">
                <div class="main-header">
                    <a href="/" class="logo">
                        <h1 class="logo-text">Angle and Devil</h1>
                    </a>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/cart">Giỏ hàng</a>
                        </li>
                        <li class="breadcrumb-item breadcrumb-item-current">
                            Thông tin giao hàng
                        </li>
                        <li class="breadcrumb-item ">
                            Phương thức thanh toán
                        </li>
                    </ul>
                </div>
                <div class="main-content">

                    <div class="step">
                        <div class="step-sections " step="1">
                            <div class="section">
                                <div class="section-header">
                                    <h2 class="section-title">Thông tin giao hàng</h2>
                                </div>
                                <div class="section-content section-customer-information no-mb">

                                    <input name="utf8" type="hidden" value="✓">
                                    <div class="inventory_location_data">

                                        <input name="customer_shipping_country" type="hidden" value="">
                                        <input name="customer_shipping_province" type="hidden" value="">
                                        <input name="customer_shipping_district" type="hidden" value="">
                                        <input name="customer_shipping_ward" type="hidden" value="">

                                    </div>
                                    <p class="section-content-text">
                                        Bạn đã có tài khoản?
                                        <a
                                            href="/login">Đăng
                                            nhập</a>
                                    </p>
                                    <div class="fieldset">
                                        <div class="field field-required  ">
                                            <div class="field-input-wrapper">
                                                <label class="field-label" for="billing_address_full_name">Họ và
                                                    tên</label>
                                                    <input placeholder="Họ và tên" autocapitalize="off" spellcheck="false"
                                                    class="field-input" size="30" type="text"
                                                    id="billing_address_full_name" name="billing_address[full_name]"
                                                    value="">
                                            </div>

                                        </div>
                                        <div class="field field-required field-two-thirds  ">
                                            <div class="field-input-wrapper">
                                                <label class="field-label" for="checkout_user_email">Email</label>
                                                    <input placeholder="Email" autocapitalize="off" spellcheck="false"
                                                    class="field-input" type="email" id="checkout_user_email"
                                                    value="">     
                                            </div>

                                        </div>
                                        <div class="field field-required field-third  ">
                                            <div class="field-input-wrapper">
                                                <label class="field-label" for="billing_address_phone">Số điện
                                                    thoại</label>
                                                    <input placeholder="Số điện thoại" autocapitalize="off"
                                                    spellcheck="false" class="field-input" id="billing_address_phone"
                                                    type="tel" id="billing_address_phone" name="billing_address[phone]"
                                                    value="">
                                            </div>

                                        </div>
                                        <div class="field field-required  ">
                                            <div class="field-input-wrapper">
                                                <label class="field-label" for="billing_address_address1">Địa
                                                    chỉ</label>
                                                    <input placeholder="Địa chỉ" autocapitalize="off" spellcheck="false"
                                                    class="field-input" size="30" type="text"
                                                    id="billing_address_address1" name="billing_address[address1]"
                                                    value="">                    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="section-content">
                                    <div class="fieldset">
                                        <form id="form_update_location" class="clearfix order-checkout__loading"
                                            accept-charset="UTF-8" method="post">
                                            <input name="selected_customer_shipping_province" type="hidden" value="">
                                            <input name="selected_customer_shipping_district" type="hidden" value="">
                                            <input name="selected_customer_shipping_ward" type="hidden" value="">
                                            <input name="utf8" type="hidden" value="✓">
                                            <div class="order-checkout__loading--box">
                                                <div class="order-checkout__loading--circle"></div>
                                            </div>
                                            <div class="field field-half  field-show-floating-label">
                                                <div class="field-input-wrapper field-input-wrapper-select">
                                                    <label class="field-label" for="customer_shipping_country">Quốc
                                                        gia</label>
                                                    <select class="field-input" id="customer_shipping_country"
                                                        name="customer_shipping_country">
                                                        <option data-code="null" value="null">Chọn quốc gia</option>
                                                        <option data-code="VN" value="241" selected="">Vietnam</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="field field-show-floating-label field-required field-half ">
                                                <div class="field-input-wrapper field-input-wrapper-select">
                                                    <label class="field-label" for="customer_shipping_province"> Tỉnh /
                                                        thành </label>
                                                    <select class="field-input" id="customer_shipping_province"
                                                        name="customer_shipping_province">
                                                        <option data-code="null" value="-1" selected=""> Chọn tỉnh /
                                                            thành </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="field field-show-floating-label field-required field-half ">
                                                <div class="field-input-wrapper field-input-wrapper-select">
                                                    <label class="field-label" for="customer_shipping_district">Quận /
                                                        huyện</label>
                                                    <select class="field-input" id="customer_shipping_district"
                                                        name="customer_shipping_district">
                                                        <option data-code="null" value="-1" selected="">Chọn quận /
                                                            huyện</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="field field-show-floating-label field-required  field-half  ">
                                                <div class="field-input-wrapper field-input-wrapper-select">
                                                    <label class="field-label" for="customer_shipping_ward">Phường /
                                                        xã</label>
                                                    <select class="field-input" id="customer_shipping_ward"
                                                        name="customer_shipping_ward">
                                                        <option data-code="null" value="-1" selected="">Chọn phường /
                                                            xã</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="section-content section-customer-information fieldset"
                                        id="div_country_not_vietnam" style="display: none;">
                                        <div class="field field-two-thirds">
                                            <div class="field-input-wrapper">
                                                <label class="field-label" for="billing_address_city">Thành phố</label>
                                                <input placeholder="Thành phố" autocapitalize="off" spellcheck="false"
                                                    class="field-input" size="30" type="text" id="billing_address_city"
                                                    name="billing_address[city]" value="">
                                            </div>
                                        </div>
                                        <div class="field field-third">
                                            <div class="field-input-wrapper">
                                                <label class="field-label" for="billing_address_zip">Mã bưu
                                                    chính</label>
                                                <input placeholder="Mã bưu chính" autocapitalize="off"
                                                    spellcheck="false" class="field-input" size="30" type="text"
                                                    id="billing_address_zip" name="billing_address[zip]" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="change_pick_location_or_shipping">

                                </div>
                            </div>
                        </div>
                        <div class="step-footer">
                            <form id="form_next_step" accept-charset="UTF-8" method="post">
                                <input name="utf8" type="hidden" value="✓">
                                <button class="step-footer-continue-btn btn">
                                    <span class="btn-content">Thanh toán</span>
                                    <i class="btn-spinner icon icon-button-spinner"></i>
                                </button>
                            </form> 
                            <a class="step-footer-previous-link" href="/cart">
                                <svg class="previous-link-icon icon-chevron icon" xmlns="http://www.w3.org/2000/svg"
                                    width="6.7" height="11.3" viewBox="0 0 6.7 11.3">
                                    <path d="M6.7 1.1l-1-1.1-4.6 4.6-1.1 1.1 1.1 1 4.6 4.6 1-1-4.6-4.6z"></path>
                                </svg>
                                Giỏ hàng
                            </a>
                        </div>
                    </div>
                </div>
                <div class="main-footer footer-powered-by" data>
                </div>
            </div>
        </div>

    </div>
</body>

</html>
