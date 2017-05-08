  <?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="container-fluid client_info">
  <div class="clearfix detail_title col-md-5">
    <div class="clearfix col-md-12">
      <div class="thumbnail" style="background-image:url('<?php echo $thumbnail_position.$client->thumbnail_name ;?>');"></div>

    </div>
    <?php
    /*
      カード部分
    */
    ?>
    <div class="row col-md-12 detal_text">
      <ul class="list-unstyled">
        <li class="client_name text-center"><?= h($client->first_name) ?> <?= h($client->last_name) ?></li>
        <li class="client_name_ruby text-center"><?= h($client->first_name_ruby)?> <?= h($client->last_name_ruby)?></li>
        <li class="group_name">所属 <?= h($client->universities_name) ?></li>
        <li class="sex">性別 <?= $client->has('sex') ? h($client->sex->name) : ''?></li>
        <li class="category">カテゴリ <?= $client->has('category') ? h($client->category->name) : ''?></li>
        <li class="age">年齢 <?= h($client->age)?>歳</li>
        <li>出身地 <?= h($client->lived_place) ?></li>
        <li>住所 <?= h($client->prefecture).h($client->address1).h($client->address2)?></li>
        <li class="email">email <?= h($client->email)?></li>
        <li class="phone">phone <?= $this->Number->format($client->phone_number) ?></li>
        <li class="sns">id <?= h($client->sns_info)?></li>
      </ul>
    </div>
  </div>
  <?php
    /*
    詳細部分
    */
  ?>
  <div class="row col-md-7">
    <table class="table">
      <tr class="infocategory_tag"><td>プロジェクト情報</td><td></td></tr>
      <tr><td class="col-md-5">担当者</td><td class="col-md-7"><?= $client->has('manager') ? $this->Html->link($client->manager->username, ['controller' => 'Managers', 'action' => 'view', $client->manager->id]) : '' ?></td></tr>
      <tr>
        <td>プロジェクト名</td>
        <td>
          <?php foreach($test as $data):?>
            <p><?= h($data)?></p>
          <?php endforeach;?>
        </td>
      </tr>
      <tr><td>実施日</td><td><?= h($client->project->dateof)?></td></tr>
      <tr><td>エンドクライアント名</td><td><?= $client->has('endclient') ? $this->Html->link($client->endclient->name, ['controller' => 'Endclients', 'action' => 'view', $client->endclient->id]) : '' ?></td></tr>
      <tr><td>評価</td><td><?= $this->Number->format($client->evaluation) ?></td></tr>
      <tr class="infocategory_tag"><td>対人情報</td><td></td></tr>
      <tr><td>リクルート元</td><td>第1:<?= h($client->first_recruiter_name) ?> 第2:<?= h($client->second_recruiter_name)?></td></tr>
      <tr><td>関連の友達</td><td>飯田、飯田、飯田</td></tr>
      <tr class="infocategory_tag"><td>謝礼情報</td><td></td></tr>
      <tr><td>銀行名</td><td><?= h($client->bunk_name)?></td></tr>
      <tr><td>口座番号</td><td><?= h($client->bank_number)?></td></td>
      <tr><td>支店名</td><td><?= h($client->branch_name)?></td></td>
      <tr><td>支店番号</td><td><?= h($client->branch_num)?></td></td>
      <tr><td>謝礼額</td><td><?= $this->Number->format($client->fee) ?>円</td></tr>
      <tr><td>手数料差引</td><td><?= $client->has('commission_admit') ? h($client->commission_admit->name): '' ?></td></tr>
      <tr><td>支払日</td><td>2017/4/1</td></tr>
      <tr><td>謝礼理由</td><td><?= $client->has('pay_reason') ? h($client->pay_reason->name) : '' ?></td></tr>
      <tr><td>支払状況</td><td class="green_text"><?= $client->has('paidstatus') ? h($client->paidstatus->status_name) : '' ?></td></tr>
      <tr><td>その他活動</td><td><?= h($client->activities)?></td></tr>
      <tr><td>備考</td><td><?= h($client->remarks)?></td></tr>
    </table>
  </div>
</div>
