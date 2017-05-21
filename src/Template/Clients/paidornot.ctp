<div class="clearfix all_wrapper">
  <?php echo $this->element('sidebar');?>
  <div class="container-fluid col-md-10 clients">
        <div>
          <div class="search_form">
            <h2><img src="/img/search_icon.png" width="25px" height="25px"></h2>
            <div>
            <?= $this->Form->create(null, ['type' => 'get','style'=>'display:none'])?>
              <?php echo $this->Form->input('username',['value' => $this->request->query('username'),'label' => '名前']);?>
              <?php echo $this->Form->input('first_name_ruby',['value' => $this->request->query('first_name_ruby'),'label'=>'フリガナ']);?>
              <?php echo $this->Form->input('project_name',['value' => $this->request->query('project_name'),'label' => 'プロジェクト名']);?>
              <?php echo $this->Form->input('phone_number',['value' => $this->request->query('phone_number'),'label' => '電話番号']);?>
              <?php echo $this->Form->input('category',['value' => $this->request->query('category'),'label'=>'カテゴリ']);?>
              <?php echo $this->Form->input('birth',['value' => $this->request->query('birth'),'label'=>'誕生日','placeholder'=>'例:2017-05-05']);?>
              <?= $this->Form->button(__('検索'))?>
              <?= $this->Form->end() ?>
            </div>
          </div>
          <p class="clients-title">報酬支払情報 (全て)</p>
          <table class="table">
            <thead>
                <tr><th>名前 (年齢)</th><th>フリガナ</th><th>プロジェクト名</th><th>金額</th><th>銀行名</th><th>口座番号</th><th>支店名</th><th>支店番号</th><th>支払状況</th><th>操作</th><tr>
            </thead>
            <tbody>
              <?php $counter = 0;$person = "";?>
              <?php foreach($clients as $client):?>
                  <tr class="gray_background">
                    <td><?= $this->Html->link(__(h($client->first_name) . ' ' . h($client->last_name)), ['action' => 'view', $client->id]) ?> (<?= h($client->age)?>)</td>
                    <td><?= h($client->first_name_ruby)?> <?= h($client->last_name_ruby)?></td>
                    <td><?= h($client->project->name)?></td>
                    <td><?= h($client->fee)?>円</td>
                    <td><?= h($client->bunk_name) ?></td>
                    <td><?= h($client->bank_number) ?></td>
                    <td><?= h($client->branch_name) ?></td>
                    <td><?= h($client->branch_num) ?></td>
                    <td><?= h($client->paidstatus->status_name) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('修正'), ['action' => 'edit', $client->id]) ?>
                        <?= $this->Form->postLink(__('削除'), ['action' => 'delete', $client->id], ['confirm' => __('本当に削除してよろしいですか？ # {0}?', $client->id)]) ?>
                    </td>
                  </tr>
              <?php endforeach;?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="pagination">
      <ul class="list-unstyled list-inline">
        <?= $this->Paginator->first('<< ' . __('first')) ?>
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
        <?= $this->Paginator->last(__('last') . ' >>') ?>
      </ul>
    </div>
