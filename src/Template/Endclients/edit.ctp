<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="clearfix all_wrapper">
  <?php echo $this->element('sidebar');?>
  <!--main contents-->
  <div class="container-fluid col-md-10 clients">
    <?= $this->Form->create($endclient) ?>
    <div class="form-container">
      <div class="title">
        <p>エンドクライアント情報編集</p>
      </div>
      <form action="index.html" method="post">
        <p><?php echo $this->Form->control('name',['label' => '企業名']);?></p>
        <p><?php echo $this->Form->control('phone_number' ,['label' => '電話番号','pattern' => "^[0-9A-Za-z]+$"]);?></p>
        <p><?php echo $this->Form->control('address' ,['label' => '住所']);?></p>
        <p><?php echo $this->Form->control('capital_stock',['label' => '資本金','pattern' => "^[0-9A-Za-z]+$"]);?></p>
        <p><?php echo $this->Form->control('department',['label' => '部署名']);?></p>
        <p><?php echo $this->Form->control('charged_person',['label' => '担当者名']);?></p>
      </form>
      <p class="submit-button">
        <?= $this->Form->button(__('送信')) ?>
      </p>
      <?= $this->Form->end() ?>
    </div>
  </div>
</div>
