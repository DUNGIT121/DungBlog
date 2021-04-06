@extends('admin_layout')
@section('admin_content')
<div class="row">

	<div class="col-12">
		<center><h1 style="margin: 3%"><b>Chi tiết bài viết</b></h1></center>
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
			<h2><b>Tên bài viết:</b></h2> 		<h4> {{$post->name}}</h4>
			<h2><b>Danh mục bài viết:</b></h2> 	<h4>{{$post->category->name}}</h4>
			<h2><b>Nội dung bài viết:</b></h2> 	<h4>{!!$post->content!!}</h4>
			<h2><b>Ngày tạo:</b></h2> 			<h4>{{$post->created_at}}</h4>
		</div>

	</div>

</div>
@endsection