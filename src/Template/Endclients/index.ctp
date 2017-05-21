<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="clearfix all_wrapper">
  <?php echo $this->element('sidebar');?>
  <div class="container-fluid col-md-10 clients">
        <div>
          <p class="clients-title">エンドクライアント一覧</p>
          <table class="table">
            <thead>
              <tr><th>id</th><th>企業名</th><th>電話番号</th><th>住所</th><th>資本金</th><th>部署名</th><th>担当者名</th><th>登録日</th><th>修正日</th><th>操作</th><tr>
            </thead>
            <tbody>
              <?php foreach($endclients as $endclient):?>
                  <tr>
                    <td><?= $this->Number->format($endclient->id) ?></td>
                    <td><?= $this->Html->link($endclient->name,['controller'=>'endclients','action'=>'view',$endclient->id]) ?></td>
                    <td><?= h($endclient->phone_number) ?></td>
                    <td><?= h($endclient->address) ?></td>
                    <td><?= h($endclient->capital_stock)?></td>
                    <td><?= h($endclient->department)?></td>
                    <td><?= h($endclient->charged_person)?></td>
                    <td><?= h($endclient->created)?></td>
                    <td><?= h($endclient->modified)?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('詳細'), ['action' => 'view', $endclient->id]) ?>
                        <?= $this->Html->link(__('修正'), ['action' => 'edit', $endclient->id]) ?>
                        <?= $this->Form->postLink(__('削除'), ['action' => 'delete', $endclient->id], ['confirm' => __('本当に削除してもよろしいですか？ # {0}?', $endclient->id)]) ?>
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
