@extends('admin_layout')
@section('admin_content')
<div class="row">

  <div class="col-12">
    <center><h2 style="margin: 3%"><b>Cập nhật bài viết</b></h2></center>
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
    <form action="{{route('posts.update',$post->id)}}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="exampleFormControlInput1"><strong>Tên bài viết:</strong></label>
        <input type="text" name="name" class="form-control" id="exampleFormControlInput1" value="{{$post->name}}">
        @error('name')
        <p style="color: red">{{$message}}</p>
        @enderror
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1"><strong>Hình ảnh bài viết:</strong></label>
        <input class="form-control form-control-sm" name="image" id="formFileSm" type="file"/>
        <td><img src="{{URL::to('images/'.$post->image)}}" height="100" width="200"></td>
        @error('image')
        <p style="color: red">{{$message}}</p>
        @enderror
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1"><strong>Danh mục bài viết:</strong></label>
        <select class="form-control" name="category_post_id" id="exampleFormControlSelect1">
          <option selected value="{{$post->category_post_id}}">{{$post->category->name}}</option>
          @foreach($categorys as $category)
          <option value="{{$category->id}}">{{$category->name}}</option>
          @endforeach
        </select>
        @error('category_post_id')
        <p style="color: red">{{$message}}</p>
        @enderror
      </div>
      <div class="form-group">
        <label for="exampleFormControlTextarea1"><strong>Nội dung bài viết:</strong></label>
        <textarea class="form-control" name="content" id="ckeditor" rows="3">{!!$post->content!!}</textarea>
        @error('content')
        <p style="color: red">{{$message}}</p>
        @enderror
      </div>
      <center><button type="submit" class="btn btn-success">Cập nhật bài viết</button></center> 
    </form>
  </div>

</div>
@endsection
