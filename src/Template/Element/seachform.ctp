<div class="search_form">
  <h2><img src="<?php echo ROOT;?>/webroot/img/search_icon.png" width="25px" height="25px"></h2>
  <form id="search_form_input">
    <div class="form-group">
      <?php /*
      <label>支払い状況</label>
      <label id="done" class="green_text radio-padding"><input type="checkbox" name="payment" value="settled">済</label>
      <label id="not_done" class="red_color radio-padding"><input type="checkbox" name="payment" value="still">未</label>
      */?>
    </div>
    <div class="form-group">
      <label>なんて名前だっけ</label>
      <input id="client-name" class="form-control" type="text" name="client_name">
    </div>
    <div class="form-group">
      <label>名前のフリガナ</label>
      <input id="name-ruby" class="form-control" type="text" name="client_name_ruby">
    </div>
    <div class="form-group">
      <label>プロジェクト名</label>
      <input id="project-name" class="form-control" type="text" name="client_category">
    </div>
    <div class="form-group">
      <label>所属</label>
      <input id="group-name" class="form-control" type="text" name="client_affiliation">
    </div>
    <div class="form-group">
      <label>誕生日</label>
      <input id="birthday" class="form-control" type="text" name="birthday">
    </div>
    <div class="form-group">
      <label>電話番号</label>
      <input id="phone_number" class="form-control" type="text" name="phone_number">
    </div>
  </form>
</div>
