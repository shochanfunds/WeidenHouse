<?php
/**
  * @var \App\View\AppView $this
  */
?>
    <div class="clearfix all_wrapper">
      <?php echo $this->element('sidebar');?>

      <!--main contents-->
      <div class="container-fluid col-md-10 clients">
        <?= $this->Form->create($manager) ?>
        <div class="form-container">
          <div class="title">
            <p>Add Manager</p>
          </div>
          <form action="index.html" method="post">
            <p>
              <?php echo $this->Form->control('username');?>
            </p>
            <p>
              <?php echo $this->Form->control('password');?>
            </p>
            <p>
              <?php echo $this->Form->control('email');?>
            </p>
            <p>
              <?php echo $this->Form->control('physicalwidth');?>
            </p>
            <p>
              <?php echo $this->Form->control('physicalheight');?>
            </p>
            <p>
              <?php echo $this->Form->control('status');?>
            </p>
          </form>
          <p class="submit-button">
            <?= $this->Form->button(__('送信')) ?>
          </p>
          <?= $this->Form->end() ?>
        </div>
      </div>
    </div>
