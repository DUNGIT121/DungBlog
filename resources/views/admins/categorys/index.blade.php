@extends('admin_layout')
@section('admin_content')
<div class="row">

	<div class="col-12">
		<center><h2 style="margin: 3%">Danh mục bài viết</h2></center>
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
		<table class="table">
			<a class="btn btn-success" href="{{route('categorys.create')}}" role="button" style="margin-left: 88%">Thêm danh mục bài viết</a>
			<?php
			$i=0;
			?>
			<thead class="thead-dark">
				<tr>
					<th scope="col">STT</th>
					<th scope="col">Tên danh mục</th>
					<th scope="col">Mô tả danh mục</th>
					<th scope="col">Hành động</th>
				</tr>
			</thead>
			<tbody>
				@foreach($categorys as $category)
				<tr>
					<th scope="row">{{$i++}}</th>
					<td>{{$category->name}}</td>
					<td>{{$category->description}}</td>
					<td>
						<a href="{{route('categorys.show', $category->id)}}" class="btn btn-info" role="button" >Xem</a>
						<a href="{{route('categorys.edit',$category->id)}}" class="btn btn-secondary" role="button">Sửa</a>
						<a href="{{route('categorys.destroy',$category->id)}}" class="btn btn-danger delete" data-method="DELETE" role="button">Xóa</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>

	</div>

</div>
<center>{{$categorys->links()}}</center>
<script type="text/javascript">
  $(document).ready(function(){
    $('.delete').click(function(e){
      e.preventDefault();
      var url = $(this).attr('href');
      if(confirm('bạn có chắc chắn muốn xóa bài viết này không?')){
        $.ajax({
        url:url,
        type:'delete',
        success: function(response){
            setTimeout(function(){
              window.location.reload();
              alert('Xóa danh mục bài viết thành công!')
            },500);
          }
      })
      }
      
    })
    
  });
</script>
@endsection