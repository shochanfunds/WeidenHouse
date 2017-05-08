<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="clearfix all_wrapper">
  <?php echo $this->element('sidebar');?>
  <!--main contents-->
  <div class="container-fluid col-md-10 clients">
    <?= $this->Form->create($clientsProject) ?>
    <div class="form-container">
      <div class="title">
        <p>クライアントとプロジェクト紐付け</p>
      </div>
      <form action="index.html" method="post">
        <p>
          <?php echo $this->Form->control('clients_id', ['options' => $clients]);?>
        </p>
        <p>
          <?php echo $this->Form->control('projects_id', ['options' => $projects]);?>
        </p>
      <p class="submit-button">
        <?= $this->Form->button(__('送信')) ?>
      </p>
      <?= $this->Form->end() ?>
    </div>
  </div>
</div>
