@extends('layout')
@section('content')
<div class="row">
	<div class="col-xs-12 col-md-12 section-container-spacer">
		<h2 class="text-center" style="margin: 3%; color:#009970"><b>"DŨNG BLOG - BLOG SẮC ĐẸP"</b></h2>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<h2 class="text-center">{{$post->name}}</h2>
		<center><img src="{{URL::to('images/',$post->image)}}" height="400" width="800" style="margin: 3%"></center>
		<!-- <img src="./assets/images/img-02.jpg" alt="" class="img-responsive"> -->
		<p style="">{!!$post->content!!}</p>
	</div>
</div>

<div class="row">
	<div class="col-xs-12 col-md-12 section-container-spacer">
		<h3 class="text-center" style="margin: 2%">Bài Viết Liên Quan</h3>
	</div>
</div>
<div class="row">
	@foreach($postRelates as $postRelate)
	<div class="col-xs-12 col-md-5" style="margin: 2%">
		<a href="{{route('shows.showpost',$postRelate->id)}}">
			<h3 class="text-center">{{$postRelate->name}}</h3>
			<img src="{{URL::to('images/',$postRelate->image)}}" height="200" width="400">
		</a>
		<p>{{$postRelate->category->description}}</p>

	</div>
	@endforeach 
</div>
<center>{{ $postRelates->links() }}</center> 

<form action="" data-url="{{route('comments.store')}}" id="formComment" style="margin: 2%">
	<div class="modal-body col-12" style="font-size: 18px">
		<div class="form-group text-left">
			<label class="col-ld-2">Nhận xét</label><br>
			<input class="col-lg-10" type="text" name="comment" id="comment" placeholder="Nhập nội dung">&nbsp;&nbsp;
			<button class="btn btn-info" type="submit" name="send">Bình luận</button>
		</div>
	</div>

	<div class="modal-body" style="font-size: 18px">
		@foreach($post->comments as $comment)
		<div class="text-left" style="margin: 2%">
			<b style="color: black; font-size: 20px">{{$comment->user->name}}</b>&nbsp;&nbsp; <i style="color: #A19F9F; font-size: 16px">{{$comment->created_at}}</i><br>
			<label>{{$comment->body}}</label><br>
			<a data-url="{{route('comments.destroy',$comment->id)}}" class="btn-delcmt">Xóa</a> | <a data-url="{{route('comments.edit',$comment->id)}}" class="btn-editCmt" data-toggle="modal" data-target="#edit_modal">Chỉnh sửa</a>
		</div>
		@endforeach
	</div>
</form>
@include('pages.comments.edit');
<script type="text/javascript">
	$(document).ready(function(){
		$('#formComment').submit(function(e){
			e.preventDefault();
			var url = $(this).attr('data-url');
			// alert(url);
			$.ajax({
				url:url,
				type:'post',
				data: {
					body: $('#comment').val(),
					user_id: "{{Auth::id()}}",
					id: "{{$post->id}}",
				},
				success: function(response){
					setTimeout(function(){
						window.location.reload();
					},500);
				}
			})
		})
		$('.btn-delcmt').click(function(){
			var url = $(this).attr('data-url');
			if(confirm('Bạn có chắc chắn xóa nhận xét này không?')){
				$.ajax({
					url:url,
					type: 'delete',
					success: function(response){
						setTimeout(function(){
							window.location.reload();
						},500);
					}
				})
			}
		})
		$('.btn-editCmt').click(function(e){
        var url = $(this).attr('data-url');
        $.ajax({
          url:url,
          type: 'get',
          success: function(response){
            console.log(response)
            $('#changeComment').val(response.data.body);

            $('#edit_form').attr('data-url','{{asset('comments/')}}/'+response.data.id);
          },
        })
      })
		$('#edit_form').submit(function(e){
			e.preventDefault();
			var url = $(this).attr('data-url');
			$.ajax({
				url:url,
				type: 'PUT',
				data: {
					body: $('#changeComment').val(),
				},
				success: function(response){
					setTimeout(function(){
						window.location.reload();
					},500);
				}
			})
		})
	});
</script>
@endsection