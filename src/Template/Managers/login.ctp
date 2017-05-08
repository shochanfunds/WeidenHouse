<div class="container-fluid">
  <div class="loginform_wrapper col-md-6">
    <?= $this->Form->create()?>
      <?php echo $this->Form->input('username');?>
      <?php echo $this->Form->input('password');?>
      <?php echo $this->Form->input('physicalwidth');?>
      <?php echo $this->Form->input('physicalheight');?>
      <?= $this->Form->button(__('ログイン'))?>
      <?= $this->Form->end() ?>
  </div>
</div>
