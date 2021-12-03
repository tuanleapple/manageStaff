<link rel="stylesheet" href="http://127.0.0.1:8080/public/css/user.css" type="text/css">

<section class="smb_section">
    <div class="wrapper_smb">
        <div class="gird_smb">
            <div class="grid__item_smb grid__item_smb_25">
                <div class="AccountSidebar">
                    <div class="title_account">
                        <div class="title_account_img">
                            @if(!empty($checkUser[0]['image']))
                            <span id="logo_user" style="display: contents;"><img src="/images/{{$checkUser[0]['image']}}" alt="user image"></span>
                            @else
                            <span id="logo_user" style="background-image: url('{{ asset('./images/1.jpg') }}') ; display: block;"></span>
                            @endif
                        </div>
                        <div class="content_account">
                            @if(!empty($checkUser[0]['image']))
                            <h2 class="name_account">{{$checkUser[0]['fullname']}}</h2>
                            <p>
                                {{$checkUser[0]['email']}}
                            </p>
                            @endif
                        </div>
                    </div>
                    <div class="AccountContent">
                        <div class="account_list">
                            <ul class="list-unstyled">
                                <li >
                                    <a href="/account/view=account_info.smb">
                                        <span>
                                            <i class="fas fa-user"></i>
                                        </span>
                                        <span>
                                            Hồ sơ của tôi
                                        </span>
                                    </a>
                                </li>
                                <li class="current">
                                    <a href="/account/view=order.smb">
                                        <span>
                                            <i class="fas fa-file-invoice"></i>
                                        </span>
                                        <span>
                                            Đơn hàng của tôi
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        $('ul.list-unstyled li').click(function() {
                            $('li').removeClass("active");
                            $(this).addClass("active");
                        });
                    });
                </script>
            </div>
            <div class="grid__item_smb grid__item_smb_75">
                <div class="row style_add">
                    <div class="title_address">
                        <h3>
                            Đơn hàng của tôi
                        </h3>
                    </div>
                    <div class="col-xs-12 customer-table-wrap" id="customer_orders">	
                        <div class="customer_order customer-table-bg">		
                            
                            <p>Chức Năng Đang Được Nâng Cấp
                            </p>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript" src="http://127.0.0.1:8080/public/js/components/frontend/user.js"></script>

