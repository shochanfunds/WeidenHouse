<div class="container-fluid">
  <div class="loginform_wrapper col-md-6">
    <?= $this->Form->create()?>
      <?php echo $this->Form->input('username');?>
      <?php echo $this->Form->input('password');?>
      <div style="display:none"><?php echo $this->Form->input('physicalwidth');?></div>
      <div style="display:none"><?php echo $this->Form->input('physicalheight');?></div>
      <?= $this->Form->button(__('ログイン'))?>
      <?= $this->Form->end() ?>
  </div>
</div>
