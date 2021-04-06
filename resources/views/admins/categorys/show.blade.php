@extends('admin_layout')
@section('admin_content')
<div class="row">

	<div class="col-12">
		<center><h2 style="margin: 3%">Chi tiết danh mục bài viết</h2></center>
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
		<div>
			<strong>Tên danh mục:</strong>	<h2> {{$category->name}}</h2>
			<strong>Mô tả danh mục:</strong><h2>{{$category->description}}</h2>
			<strong>Ngày Tạo:</strong>		<h2>{{$category->created_at}}</h2>
		</div>

	</div>

</div>
@endsection