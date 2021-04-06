@extends('admin_layout')

@section('admin_content')
<div class="container">
    <center><h2 style="margin: 3%"><b>Thông tin người dùng</b></h2></center>
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
  <div class="row my-2">
    <div class="col-lg-8 order-lg-2">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Thông tin</a>
            </li>
            <li class="nav-item">
                <a href="" data-target="#messages" data-toggle="tab" class="nav-link">Đổi Mật Khẩu</a>
            </li>
            <li class="nav-item">
                <a href="" data-target="#edit" data-toggle="tab" class="nav-link">Đổi Tài Khoản Email</a>
            </li>
        </ul>
        <div class="tab-content py-4">
            <div class="tab-pane active" id="profile" style="font-size: 20px">
                <h5 class="mb-3">Thông tin cá nhân của bạn</h5>
                <div class="row">
                    <div class="col-md-6" >
                        <p>Họ Tên: <strong> {{$user->name}} </strong></p>
                        <p>Email: <strong>{{$user->email}}</strong></p>
                        <p>Ngày Tạo: <strong>{{$user->created_at}}</strong> </p>
                    </div>
                </div>
                <!--/row-->
            </div>
            <div class="tab-pane" id="messages">

                <form role="form" id="changespass" method="POST" action="{{route('chanepass.chanePass',auth()->id())}}">
                    @csrf
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Mật khẩu cũ: </label>
                        <div class="col-lg-9">
                            <input class="form-control" name="current_password" id="current_password" type="password" placeholder="mật khẩu cũ">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Mật khẩu mới: </label>
                        <div class="col-lg-9">
                            <input class="form-control" name="password" id="password" type="password" placeholder="mật khẩu mới">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Xác nhận mật khẩu mới: </label>
                        <div class="col-lg-9">
                            <input class="form-control" name="password_confirmation" id="password_confirmation" type="password" placeholder="xác nhận mật khẩu mới">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label"></label>
                        <div class="col-lg-9">
                            <input type="reset" class="btn btn-secondary" value="Cancel">
                            <input type="submit" class="btn btn-primary" value="Save Changes">
                        </div>
                    </div>
                </form>
            </div>
            <div class="tab-pane" id="edit">
                <form role="form" id="changesemail" method="POST" action="{{route('changemail.changeMail',auth()->id())}}">
                    @csrf
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Email cũ: </label>
                        <div class="col-lg-9">
                            <input class="form-control" name="current_email" id="current_email" type="email" placeholder="email cũ">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Email mới: </label>
                        <div class="col-lg-9">
                            <input class="form-control" name="email" id="email" type="email" placeholder="email mới">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Xác nhận Email mới: </label>
                        <div class="col-lg-9">
                            <input class="form-control" name="email_confirmation" id="email_confirmation" type="email" placeholder="Xác nhận email mới">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label"></label>
                        <div class="col-lg-9">
                            <input type="reset" class="btn btn-secondary" value="Cancel">
                            <input type="submit" class="btn btn-primary" value="Save Change">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-4 order-lg-1 text-center">
        <img src="//placehold.it/150" class="mx-auto img-fluid img-circle d-block" alt="avatar">
        <label class="custom-file">
            <input type="file" id="file" class="custom-file-input">
            <span class="custom-file-control">Choose file</span>
        </label>
    </div>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $("#changespass").validate({
            rules: {
                current_password: {
                    required: true,
                    minlength: 8,
                    maxlength: 32
                },
                password: {
                    required: true,
                    minlength: 8,
                    maxlength: 32
                },
                password_confirmation: {
                    required: true,
                    equalTo: "#password"
                }, 
            },
            messages: {
                current_password: {
                    required: "vui lòng nhập mật khẩu của bạn!",
                    minlength:"Mật khẩu phải từ 8 ký tự trở lên!",
                    maxlength:"Mật khẩu không được quá 32 ký tự!"
                },
                password: {
                    required: "vui lòng nhập mật khẩu mới của bạn!",
                    minlength:"Mật khẩu phải từ 8 ký tự trở lên!",
                    maxlength:"Mật khẩu không được quá 32 ký tự!"
                },
                password_confirmation: {
                    required: "vui lòng nhập xác nhận mật khẩu mới của bạn!",
                    equalTo: "Mật khẩu không trùng khớp!"
                },
            },
            submitHandler: function(e){
                e.submit();
            }
        })
        $("#changesemail").validate({
            rules: {
                current_email:{
                    required: true,
                    email: true
                },
                email: {
                    required: true,
                    email: true
                },
                email_confirmation: {
                    required: true,
                    equalTo: "#email"
                },
            },
            messages:{
                current_email: {
                    required: "vui lòng nhập địa chỉ email của bạn!",
                    email: "Email không đúng định dạng!"
                },
                email: {
                    required: "Vui lòng nhập địa chỉ email mới!",
                    email: "Email không đúng định dạng!"
                },
                email_confirmation: {
                    required: "Vui lòng nhập xác nhận địa chỉ email!",
                    email: "Email không đúng định dạng!",
                    equalTo: "Email không trùng khớp!"
                },
            },
            submitHandler: function(e){
                e.submit();
            }
        })
    })
</script>
@endsection