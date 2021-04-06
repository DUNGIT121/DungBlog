@extends('admin_layout')
@section('admin_content')
<div class="row">

  <div class="col-12">
    <center><h2 style="margin: 3%">Thêm danh mục bài viết</h2></center>
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
<form action="{{route('categorys.store')}}" method="POST">
  @csrf
  <div class="form-group">
    <label for="exampleFormControlInput1">Tên danh mục</label>
    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Nhập tên danh mục bài viết">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Mô tả danh mục</label>
    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  <center><button type="submit" class="btn btn-success">Thêm danh mục</button></center> 
</form>
</div>

</div>
@endsection
