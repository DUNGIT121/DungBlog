@extends('layout')
@section('content')
<div class="row">
	<div class="col-xs-12 col-md-12 section-container-spacer">
		<h2 class="text-center" style="margin: 3%; color:#009970"><b>"DŨNG BLOG - BLOG REVIEW SKINCARE NHỮNG SẢN PHẨM GIÚP BẠN CÓ ĐƯỢC LỰC CHỌN TỐT NHẤT"</b></h2>
	</div>
</div>
<div class="row">
	@foreach($posts as $post)
	<div class="col-xs-12 col-md-5" style="margin: 2%">
		<a href="{{route('shows.showpost',$post->id)}}">
			<h3 class="text-center">{{$post->name}}</h3>
			<img src="images/{{$post->image}}" height="200" width="400">
			<img src="./assets/images/img-02.jpg" alt="" class="img-responsive">
		</a>
		<p>{{$post->category->description}}</p>

	</div>
	@endforeach
</div>
<center>{{ $posts->links() }}</center>

@endsection