<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style type="text/css">
	body{
		background-color: #525252;
	}
	.login-form {
		width: 550px;
		margin: 100px auto;
		font-size: 15px;
	}
	.login-form form {
		margin-bottom: 15px;
		background: #f7f7f7;
		box-shadow: rgba(0, 0, 0, 0.3) 20px 20px 20px;
		padding: 30px;
	}
	.login-form h2 {
		margin: 0 0 15px;
	}
	.form-control, .btn {
		min-height: 38px;
		border-radius: 2px;
	}
	.btn {        
		font-size: 15px;
		font-weight: bold;
	}
</style>
<div class="container">
	<div class="row centered-form">
		<center><h2>Dung-Blog</h2></center>
		<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					<center><h3 class="panel-title">Đăng ký Tài Khoản</h3></center>

				</div>
				<div class="panel-body">
					<?php
					$messages = Session::get('messages');
					if($messages){
						echo '<div class="alert alert-danger">',$messages,'</div>';
						Session::put('messages',null);
					}
					?>
					<?php
					$message = Session::get('message');
					if($message){
						echo '<div class="alert alert-success">',$message,'</div>';
						Session::put('message',null);
					}
					?>
					<form role="form" method="POST" action="{{route('registers.store')}}">
						@csrf
						<div class="row">
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-group">
									<input type="text" name="first_name" id="first_name" class="form-control input-sm" placeholder="Họ">
								</div>
								@error('first_name')
								<p style="color: red">{{$message}}</p>
								@enderror
							</div>
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-group">
									<input type="text" name="last_name" id="last_name" class="form-control input-sm" placeholder="Tên">
								</div>
								@error('last_name')
								<p style="color: red">{{$message}}</p>
								@enderror
							</div>
						</div>
						<div class="form-group">
							<input type="email" name="email" id="email" class="form-control input-sm" placeholder="Địa chỉ email">
						</div>
						@error('email')
						<p style="color: red">{{$message}}</p>
						@enderror
						<div class="row">
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-group">
									<input type="password" name="password" id="password" class="form-control input-sm" placeholder="Mật khẩu">
								</div>
								@error('password')
								<p style="color: red">{{$message}}</p>
								@enderror
							</div>
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-group">
									<input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-sm" placeholder="Xác nhận mật khẩu">
								</div>
								@error('password_confirmation')
								<p style="color: red">{{$message}}</p>
								@enderror
							</div>
						</div>

						<input type="submit" value="Đăng Ký Tài Khoản" class="btn btn-info btn-block"><br>
						<center><a href="{{route('logins.index')}}">Đăng Nhập</a></center>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>