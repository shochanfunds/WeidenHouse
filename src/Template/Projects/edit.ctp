<?php
/**
  * @var \App\View\AppView $this
  */
?>
    <div class="clearfix all_wrapper">
      <?php echo $this->element('sidebar');?>
      <!--main contents-->
      <div class="container-fluid col-md-10 clients">
        <?= $this->Form->create($project) ?>
        <div class="form-container">
          <div class="title">
            <p>プロジェクト変更</p>
          </div>
          <form action="index.html" method="post">
            <p>
              <?php echo $this->Form->control('name');?>
            </p>
            <p>
              <?php echo $this->Form->control('dateof');?>
            </p>
            <p>
              <?php echo $this->Form->control('endclients_id',['label' => 'エンドクライアント名' ,'options' => $endclients]);?>
            </p>
          </form>
          <p class="submit-button">
            <?= $this->Form->button(__('送信')) ?>
          </p>
          <?= $this->Form->end() ?>
        </div>
      </div>
    </div>
