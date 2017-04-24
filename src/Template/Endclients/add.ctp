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
        <p><?php echo $this->Form->control('name');?></p>
        <p><?php echo $this->Form->control('phone_number');?></p>
        <p><?php echo $this->Form->control('address');?></p>
        <p><?php echo $this->Form->control('capital_stock');?></p>
        <p><?php echo $this->Form->control('department');?></p>
        <p><?php echo $this->Form->control('charged_person');?></p>
        <p><?php echo $this->Form->control('created');?></p>
        <p><?php echo $this->Form->control('modified');?></p>
      </form>
      <p class="submit-button">
        <?= $this->Form->button(__('送信')) ?>
      </p>
      <?= $this->Form->end() ?>
    </div>
  </div>
</div>
