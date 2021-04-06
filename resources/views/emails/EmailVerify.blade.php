<!DOCTYPE html>
<html lang="en">

<body>
	
<p>Xin Chào! {!! $register->name !!}</p>
<p>Tài khoản của bạn đã được tạo, vui lòng kích hoạt tài khoản của bạn bằng cách nhấp vào liên kết này</p>
<p><a href="{{ route('verifies.emailVerify',$register->id) }}">
	{{ route('verifies.emailVerify',$register->id) }}
</a></p>

<p>Xin Cảm ơn!</p>

</body>

</html> 