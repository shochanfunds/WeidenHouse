<?= $this->Form->create();?>
<fieldset>
  <legend><?= __('Login User')?></legend>
  <?php echo $this->Form->input('name');?>
  <?php echo $this->Form->input('password');?>
</fieldset>
<?= $this->Form->button(__('Submit'))?>
<?= $this->Form->end()?>
