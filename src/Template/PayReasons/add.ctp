<?php
/**
  * @var \App\View\AppView $this
  */
?>
    <div class="clearfix all_wrapper">
      <?php echo $this->element('sidebar');?>
      <!--main contents-->
      <div class="container-fluid col-md-10 clients">
        <?= $this->Form->create($payReason) ?>
        <div class="form-container">
          <div class="title">
            <p>謝礼理由追加</p>
          </div>
          <form action="index.html" method="post">
            <p>
              <?php echo $this->Form->control('name');?>
            </p>
            <p>
              <?php echo $this->Form->control('modifed');?>
            </p>
          </form>
          <p class="submit-button">
            <?= $this->Form->button(__('送信')) ?>
          </p>
          <?= $this->Form->end() ?>
        </div>
      </div>
    </div>
