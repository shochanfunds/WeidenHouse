<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="clearfix all_wrapper">
  <?php echo $this->element('sidebar');?>
  <div class="container-fluid col-md-10 clients">
        <div>
          <div class="search_form hover_effect">
            <h2><img src="/img/search_icon.png" width="25px" height="25px"></h2>
            <div id="form_div" style="display:none">
            <?= $this->Form->create(null, ['type' => 'get'])?>
              <?php echo $this->Form->input('name',['value' => $this->request->query('name'),'label'=>'責任者名']);?>
              <?php echo $this->Form->input('charged_person',['value' => $this->request->query('charged_person'),'label' => '企業名']);?>
              <?php echo $this->Form->input('address',['value' => $this->request->query('address'),'label' => '住所']);?>
              <?= $this->Form->button(__('検索'))?>
              <?= $this->Form->end() ?>
            </div>
          </div>

          <p class="clients-title">エンドクライアント一覧</p>
          <table class="table">
            <thead>
              <tr><th>id</th><th>担当者名</th><th>フリガナ</th><th>企業名</th><th>役職名</th><th>操作</th><tr>
            </thead>
            <tbody>
              <?php foreach($endclients as $endclient):?>
                  <tr>
                    <td><?= $this->Number->format($endclient->id) ?></td>
                    <td><?= $this->Html->link($endclient->name,['controller'=>'endclients','action'=>'view',$endclient->id]) ?></td>
                    <td><?= h($endclient->department)?></td>
                    <td><?= h($endclient->capital_stock)?></td>
                    <td><?= h($endclient->charged_person)?></td>
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
