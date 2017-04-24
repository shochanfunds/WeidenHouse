<?php
/**
  * @var \App\View\AppView $this
  */
?>
    <div class="clearfix all_wrapper">
      <?php echo $this->element('sidebar');?>
      <!--main contents-->
      <div class="container-fluid col-md-10 clients">
        <?= $this->Form->create($paidstatus) ?>
        <div class="form-container">
          <div class="title">
            <p>Add Manager</p>
          </div>
          <form action="index.html" method="post">
            <p>
              <?php echo $this->Form->control('status_name');?>
            </p>
          </form>
          <p class="submit-button">
            <?= $this->Form->button(__('送信')) ?>
          </p>
          <?= $this->Form->end() ?>
        </div>
      </div>
    </div>
