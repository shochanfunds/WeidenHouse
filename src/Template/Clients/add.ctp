<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="clearfix all_wrapper">
  <?php echo $this->element('sidebar');?>
  <!--main contents-->
  <div class="container-fluid col-md-10 clients">
    <?= $this->Form->create($client,['type' => 'file']) ?>
    <div class="form-container">
      <div class="title">
        <p>インタビュー対象者追加</p>
      </div>
      <form action="index.html" method="post">
        <p>
          <?php echo $this->Form->control('managers_id', ['label' => '担当者' ,'options' => $managers]);?>
        </p>
        <p>
          <?php echo $this->Form->control('birthday' , array('type' => 'date','dateFormat' => 'YMD','monthNames' => false,'maxYear' => date('Y'),'minYear' => date('Y') - 100,));?>
        </p>
        <p>
          <?php echo $this->Form->input('thumbnail', ['label' => 'プロフィール画像','type' => 'file']);?>
        </p>
        <p>
          <?php echo $this->Form->control('categories_id' , ['label' => 'カテゴリ' ,'options' => $categories]);?>
        </p>
        <p>
          <?php echo $this->Form->control('first_name' ,['label' => '氏名']);?>
        </p>
        <p>
          <?php echo $this->Form->control('first_name_ruby' ,['label' => 'フリガナ']);?>
        </p>
        <p>
          <?php echo $this->Form->control('post_number',['label' => '郵便番号','pattern' => "^[0-9A-Za-z]+$"]);?>
        </p>
        <p>
          <?php echo $this->Form->control('email' ,['label' => 'Emailアドレス']);?>
        </p>
        <p>
          <?php echo $this->Form->control('prefecture' ,['label' => '都道府県']);?>
        </p>
        <p>
          <?php echo $this->Form->control('address1',['label' => '市区町村番地']);?>
        </p>
        <p>
          <?php echo $this->Form->control('address2',['label' => '建物名']);?>
        </p>
        <p>
          <?php echo $this->Form->control('howtopays_id', ['label' => '支払い方法','options' => $howtopays]);?>
        </p>
        <p>
          <?php echo $this->Form->control('bunk_name' ,['label'=>'銀行名']);?>
        </p>
        <p>
          <?php echo $this->Form->control('branch_name' ,['label' => '支店名']);?>
        </p>
        <p>
          <?php echo $this->Form->control('branch_num' ,['label' => '支店番号']);?>
        </p>
        <p>
          <?php echo $this->Form->control('bank_number' ,['label' => '口座番号','class' => 'not_hifun']);?>
        </p>
        <p>
          <?php echo $this->Form->control('phone_number' ,['label' => '電話番号','pattern' => "^[0-9A-Za-z]+$","class" => "not_hifun"]);?>
        </p>
        <p>
          <?php echo $this->Form->control('evaluation' ,['label' => '評価','pattern' => "^[0-9A-Za-z]+$"]);?>
        </p>
        <p>
          <?php echo $this->Form->control('first_recruiter_name' ,['label' => '第一リクルーター名']);?>
        </p>
        <p>
          <?php echo $this->Form->control('first_rectuiter_fee' ,['label' => '第一リクルーター謝礼額','pattern' => "^[0-9A-Za-z]+$"]);?>
        </p>
        <p>
          <?php echo $this->Form->control('second_recruiter_name' ,['label' => '第二リクルーター名']);?>
        </p>
        <p>
          <?php echo $this->Form->control('second_recruiter_fee' ,['label' => '第二リクルーター謝礼額','pattern' => "^[0-9A-Za-z]+$"]);?>
        </p>
        <p>
          <?php echo $this->Form->control('projects_id', ['label' => '関わったプロジェクト','options' => $projects]);?>
        </p>
        <p>
          <?php echo $this->Form->control('commission_admits_id', ['label' => '手数料差引' ,'options' => $commissionAdmits]);?>
        </p>
        <p>
          <?php echo $this->Form->input('friends',['value' => $this->request->query('friends'),'label'=>'関連の友達']);?>
        </p>
        <p>
          <?php echo $this->Form->control('high_schools_name',['label' => '出身高校名']);?>
        </p>
        <p>
          <?php echo $this->Form->control('universities_name' ,['label' => '出身大学名']);?>
        </p>
        <p>
          <?php echo $this->Form->control('school_year',['label' => '学年','pattern' => "^[0-9A-Za-z]+$"]);?>
        </p>
        <p>
          <?php echo $this->Form->control('sexes_id', ['label' => '性別' ,'options' => $sexes]);?>
        </p>
        <p>
          <?php echo $this->Form->control('companies_name' ,['label' => '企業名']);?>
        </p>
        <p>
          <?php echo $this->Form->control('actitivies' ,['label' => 'その他活動']);?>
        </p>
        <p>
          <?php echo $this->Form->control('sns_info',['label' => 'SNS情報']);?>
        </p>
        <p>
          <?php echo $this->Form->control('pay_reasons_id', ['label' => '謝礼理由' ,'options' => $payReasons]);?>
        </p>
        <p>
          <?php echo $this->Form->control('lived_place' ,['label' => '出身地']);?>
        </p>
      </form>
      <p>
        <?php echo $this->Form->control('remarks' ,['label' => '備考欄']);?>
      </p>
      <p class="submit-button">
        <?= $this->Form->button(__('送信')) ?>
      </p>
      <?= $this->Form->end() ?>
    </div>
  </div>
</div>
