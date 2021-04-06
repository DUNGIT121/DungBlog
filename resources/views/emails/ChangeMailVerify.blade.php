<!DOCTYPE html>
<html lang="en">

<body>
	<?php
		$id = session::get('id');
		$name = session::get('name');
	?>
<p>Xin Chào! {!! $name !!}</p>
<p>Tài khoản của bạn đã được cập nhật, vui lòng xác nhận cập nhật của bạn bằng cách nhấp vào liên kết này</p>
<p><a href="{{ route('changemailverifies.changeMailVerify',$id) }}">
	{{ route('changemailverifies.changeMailVerify',$id) }}
</a></p>

<p>Xin Cảm ơn!</p>

</body>

</html> 