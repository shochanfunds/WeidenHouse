<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="clearfix all_wrapper">
  <?php echo $this->element('sidebar');?>
  <!--main contents-->
  <div class="container-fluid col-md-10 clients">
    <?= $this->Form->create($client) ?>
    <div class="form-container">
      <div class="title">
        <p>インタビュー対象者情報追加</p>
      </div>
      <form action="index.html" method="post">
        <p>
          <?php echo $this->Form->control('paidstatuses_id', ['options' => $paidstatuses]);?>
        </p>
        <p>
          <?php echo $this->Form->control('managers_id', ['options' => $managers]);?>
        </p>
        <p>
          <?php echo $this->Form->control('age'); ?>
        </p>
        <p>
          <?php echo $this->Form->control('endclients_id',['options' => $endclients]);?>
        </p>
        <p>
          <?php echo $this->Form->control('first_name');?>
        </p>
        <p>
          <?php echo $this->Form->control('last_name');?>
        </p>
        <p>
          <?php echo $this->Form->control('first_name_ruby');?>
        </p>
        <p>
          <?php echo $this->Form->control('last_name_ruby');?>
        </p>
        <p>
          <?php echo $this->Form->control('prefecture');?>
        </p>
        <p>
          <?php echo $this->Form->control('address1');?>
        </p>
        <p>
          <?php echo $this->Form->control('address2');?>
        </p>
        <p>
          <?php echo $this->Form->control('post_number');?>
        </p>
        <p>
          <?php echo $this->Form->control('fee');?>
        </p>
        <p>
          <?php echo $this->Form->control('howtopays_id', ['options' => $howtopays]);?>
        </p>
        <p>
          <?php echo $this->Form->control('birthday');?>
        </p>
        <p>
          <?php echo $this->Form->control('phone_number');?>
        </p>
        <p>
          <?php echo $this->Form->control('email');?>
        </p>
        <p>
          <?php echo $this->Form->control('evaluation');?>
        </p>
        <p>
          <?php echo $this->Form->control('first_recruiter_name');?>
        </p>
        <p>
          <?php echo $this->Form->control('first_rectuiter_fee');?>
        </p>
        <p>
          <?php echo $this->Form->control('second_recruiter_name');?>
        </p>
        <p>
          <?php echo $this->Form->control('second_recruiter_fee');?>
        </p>
        <p>
          <?php echo $this->Form->control('third_recruiter_name');?>
        </p>
        <p>
          <?php echo $this->Form->control('third_recruiter_fee');?>
        </p>
        <p>
          <?php echo $this->Form->control('forth_recruiter_name');?>
        </p>
        <p>
          <?php echo $this->Form->control('forth_rectuiter_fee');?>
        </p>
        <p>
          <?php echo $this->Form->control('projects_id', ['options' => $projects]);?>
        </p>
        <p>
          <?php echo $this->Form->control('commission_admits_id', ['options' => $commissionAdmits]);?>
        </p>
        <p>
          <?php echo $this->Form->control('high_schools_name');?>
        </p>
        <p>
          <?php echo $this->Form->control('universities_name');?>
        </p>
        <p>
          <?php echo $this->Form->control('sexes_id', ['options' => $sexes]);?>
        </p>
        <p>
          <?php echo $this->Form->control('companies_name');?>
        </p>
        <p>
          <?php echo $this->Form->control('activities');?>
        </p>
        <p>
          <?php echo $this->Form->control('sns_info');?>
        </p>
        <p>
          <?php echo $this->Form->control('pay_reasons_id', ['options' => $payReasons]);?>
        </p>
        <p>
          <?php echo $this->Form->control('school_year');?>
        </p>
        <p>
          <?php echo $this->Form->control('lived_place');?>
        </p>
        <p>
          <?php echo $this->Form->control('remarks');?>
        </p>
      </form>
      <p class="submit-button">
        <?= $this->Form->button(__('送信')) ?>
      </p>
      <?= $this->Form->end() ?>
    </div>
  </div>
</div>
