<link rel="stylesheet" href="/public/css/loginClient.css" type="text/css">
<section id="register_smb">
		<div class="wrapper_smb">
			<div class="gird_smb">
				<div class="grid__item_smb">
					<div class="logins">
						<div class="logins_title">
							<h2>
								Đăng nhập
							</h2>
							<p>Nếu bạn đã có tài khoản, đăng đăng tại đây</p>
							<p class="logins_error">* Đăng nhập thất bại, vui lòng thử lại</p>
						</div>				
						<div class="logins_main">

							<div class="login_col">
								<div class="login_main">
									<label>Email</label>
									<span>*Email không đúng định dạng</span>
									<input id="email" type="text" placeholder="Nhập Email của bạn">
								</div>
							</div>

							<div class="login_col">
								<div class="login_main">
									<label>Mật khẩu</label>
									<span>*Mật khẩu phải từ 8 ký tự trở lên</span>
									<input id="password" type="password" placeholder="Nhập mật khẩu của bạn">
								</div>
							</div>
							<div class="login_col">
								<div class="login_main">
									<div class="login_main_bottom">
										<p>Bạn quên mật khẩu?, lấy lại mật khẩu </p><a id="open_popup_send_email" href="#">Tại đây</a>
									</div>
								</div>
							</div>
							<div class="login_col">
								<div class="login_main">
									<div class="login_main_bottom">
										<button id="login_submit" class="button dark">
											<span>Đăng nhập</span>
											<img src="https://file.hstatic.net/1000187248/file/spinner_6dbec68bd28a42718f17704bf42d58e7.gif" alt="image loading">
										</button> <span>Bạn chưa có tài khoản?</span><a href="/signup">Đăng ký</a>
									</div>
								</div>
							</div>
						</div>
					</div>			
				</div>
			</div>
		</div>
</section>
<div class="modal fade" id="getPassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="send_mail_title">
                    <h2>
                        Lấy lại mật khẩu
                    </h2>
                </div>
            </div>
            <div class="modal-body">
                <div class="login_main">
					<label>Chúng tôi sẽ gửi cho bạn hướng dẫn về cách thiết lập lại mật khẩu</label>
					<span></span>
					<input id="send_email" type="text" placeholder="Nhập Email của bạn">
				</div>
            </div>
            <div class="modal-footer">
                <div class="send_mail_footer">
                    <button id="send_email_submit" class="button dark">Gửi email</button>
                    <button id="send_email_cancel" class="button dark">huỷ bỏ</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="/public/js/components/frontend/login.js"></script>
