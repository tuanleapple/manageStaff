<link rel="stylesheet" href="http://127.0.0.1:8080/public/css/user.css" type="text/css">
<section class="smb_section">
	<div class="wrapper_smb">
		<div class="gird_smb">
			<div class="grid__item_smb grid__item_smb_25">
				<div class="AccountSidebar">
					<div class="title_account">
						<div class="title_account_img">
							<span id="logo_user"
								style="background-image: url('http://127.0.0.1:8080/public/images/1.jpg') ; display: block;"></span>
						</div>
						<div class="content_account">
							<h2 class="name_account"><?= $data['cus']['fullname'] ?></h2>
							<p>
                            <?= $data['cus']['email'] ?>
							</p>
						</div>
					</div>
					<div class="AccountContent">
						<div class="account_list">
							<ul class="list-unstyled">
								<li>
									<a href="/account">
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
			</div>
			<div class="grid__item_smb grid__item_smb_75">
				<div class="accounts">
					<div class="accounts_title">
						<h2>
                        Đơn hàng của tôi
						</h2>
					</div>
					<div class="accounts_main">
						<div class="image_loading" style="display: none;">
							<img src="https://file.hstatic.net/1000187248/file/spinner_6dbec68bd28a42718f17704bf42d58e7.gif"
								alt="image loading">
						</div>
						<div class="addresses">
                            <?php if(empty($data['getbill'])) : ?>
							<p>Bạn chưa có đơn hàng nào</p>
                            <?php endif; ?>
						<div class="addresses">
							<div class="address_smb">
								<div class= "address_smb_left">
									<div class="addr_name">
										<span><i class="fas fa-image"></i></span>
                                        <?php foreach ($data['getbill'][0] as $image) :?>
                                        <img src="/public/upload/product/<?= $image['image'] ?>" alt="<?= $image['image']?>" width="50" height="50">
                                        <?php endforeach; ?>
										<!-- <p>{{$value['fname']}} {{$value['lname']}}</p> -->
									</div>
									<div class="addr_phone">
										<span><i class="fas fa-plus"></i></span>
										<p><?= number_format($data['getbill'][1],0,'',',') ?><u class="format_d">đ</u></p>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<script type="text/javascript" src="http://127.0.0.1:8080/public/js/components/frontend/user.js"></script>
