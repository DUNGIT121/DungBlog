<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login Blog</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
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
</head>
<body>
    <div class="login-form">
     <center><h2>Dung-Blog</h2></center>
     <form action="{{route('logins.store')}}" method="post">
        @csrf
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
        <h2 class="text-center">Đăng Nhập</h2>       
        <div class="form-group">
            <input type="text" name="email" class="form-control" placeholder="Tài Khoản" required="required">
            @error('email')
            <p style="color: red">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Mật Khẩu" required="required">
            @error('password')
            <p style="color: red">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Đăng Nhập</button>
        </div>
        <div class="clearfix">
            <label class="float-left form-check-label"><input type="checkbox"> Nhớ Mật Khẩu</label>
            <a href="#" class="float-right">Quên Mật Khẩu?</a>
        </div>  <br>
        <p class="text-center"><a href="{{route('registers.index')}}">Tạo tài khoản</a></p>    
    </form>
    
</div>
</body>
</html>