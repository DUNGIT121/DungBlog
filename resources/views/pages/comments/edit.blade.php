<div class="modal" id="edit_modal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Chỉnh sửa nhận xét</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body col-12" style="font-size: 18px">
        <form method="POST" id="edit_form">
          <div class="form-group text-left">
          <label class="col-ld-2">Nhận xét</label><br>
          <input class="col-lg-10" type="text" name="comment" id="changeComment">&nbsp;&nbsp;
          <button class="btn btn-info" type="submit" name="update">Cập nhật</button>
        </div>
        </form>
        
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
      </div>

    </div>
  </div>
</div>