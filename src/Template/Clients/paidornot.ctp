<div class="clearfix all_wrapper">
  <?php echo $this->element('sidebar');?>
  <div class="container-fluid col-md-10 clients">
        <div>
          <?php
           /*
            特定の条件に当てはまるクライアント一覧を表示する画面
           */
          ?>
          <?php echo $this->element('seachform');?>


          <p class="clients-title">インタビュー対象者一覧 (全て)</p>
          <table class="table">
            <thead>
                <tr><th>名前 (年齢)</th><th>性別</th><th>フリガナ</th><th>プロジェクト名</th><th>銀行名</th><th>口座番号</th><th>支店名</th><th>支店番号</th><th>支払状況</th><th>操作</th><tr>
            </thead>
            <tbody>
              <?php $counter = 0;$person = "";?>
              <?php foreach($clients as $client):?>
                <?php if($person != $client->endclient->name): $counter = $counter + 1;?>
                <?php else: $counter = $counter;?>
                <?php endif;?>
                <?php $person = $client->endclient->name;?>
                <?php if($counter % 2 == 0):?>
                  <tr  data-paidstatuse = "<?= h($client->paidstatus->statuse_name)?>" data-username="<?= h($client->first_name)?><?= h($client->last_name) ?>" data-client-name-ruby="<?= h($client->first_name_ruby) . h($client->last_name_ruby)?>" data-birthday="<?= h($client->birthday)?>" data-phone-number ="<?= h($client->phone_number)?>" data-projectname="<?= h($client->project->name)?>" data-groupname="<?= h($client->universities_name) ?>">
                <?php else:?>
                  <tr class="gray_background" data-paidstatuse = "<?= h($client->paidstatus->status_name)?>" data-username="<?= h($client->first_name)?><?= h($client->last_name) ?>" data-birthday="<?= h($client->birthday)?>" data-phone-number ="<?= h($client->phone_number)?>" data-client-name-ruby="<?= h($client->first_name_ruby) . h($client->last_name_ruby)?>" data-projectname="<?= h($client->project->name)?>" data-groupname="<?= h($client->universities_name) ?>">
                <?php endif;?>
                    <td><?= $this->Html->link(__(h($client->first_name) . ' ' . h($client->last_name)), ['action' => 'view', $client->id]) ?> (<?= h($client->age)?>)</td>
                    <td><?= $client->has('sex') ? $this->Html->link($client->sex->name, ['controller' => 'Sexes', 'action' => 'view', $client->sex->id]) : '' ?></td>
                    <td><?= h($client->first_name_ruby)?> <?= h($client->last_name_ruby)?></td>
                    <td><?= h($client->project->name)?></td>
                    <td><?= h($client->bunk_name) ?></td>
                    <td><?= h($client->bank_number) ?></td>
                    <td><?= h($client->branch_name) ?></td>
                    <td><?= h($client->branch_num) ?></td>
                    <td><?= h($client->paidstatus->status_name) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('修正'), ['action' => 'edit', $client->id]) ?>
                        <?= $this->Form->postLink(__('削除'), ['action' => 'delete', $client->id], ['confirm' => __('Are you sure you want to delete # {0}?', $client->id)]) ?>
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
