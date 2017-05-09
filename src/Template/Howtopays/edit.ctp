<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="clearfix all_wrapper">
  <?php echo $this->element('sidebar');?>
  <!--main contents-->
  <div class="container-fluid col-md-10 clients">
    <?= $this->Form->create($howtopay) ?>
    <div class="form-container">
      <div class="title">
        <p>支払い方法編集</p>
      </div>
      <form action="index.html" method="post">
        <p><?php echo $this->Form->control('name');?></p>
      </form>
      <p class="submit-button">
        <?= $this->Form->button(__('送信')) ?>
      </p>
      <?= $this->Form->end() ?>
    </div>
  </div>
</div>
