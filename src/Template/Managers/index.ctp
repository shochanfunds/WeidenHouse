<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="clearfix all_wrapper">
  <?php echo $this->element('sidebar');?>
  <div class="container-fluid col-md-10 clients">
        <div>
          <?php
           /*
            特定の条件に当てはまるクライアント一覧を表示する画面
           */
          ?>
          <p class="clients-title">管理者一覧 (全て)</p>
          <table id="account-list" class="table">
            <thead>
                <tr><th>id</th><th>名前</th><th>email</th><th>アカウントステータス</th><th>作成日</th><th>修正日</th><th>操作</th><tr>
            </thead>
            <tbody>
              <?php foreach($managers as $manager):?>
                <tr class="gray_background" data-username="<?= h($manager->username)?>">
                  <td><?= h($manager->id)?></td>
                  <td><?= h($manager->username) ?></td>
                  <td><?= h($manager->email) ?></td>
                  <td><?= $manager->has('status') ? $this->Html->link($manager->status->name, ['controller' => 'Statuses' ,'action' => 'view' ,$manager->status->id]) : '' ?></td>
                  <td><?= h($manager->created) ?></td>
                  <td><?= h($manager->modified)?></td>
                  <td class="actions">
                      <?= $this->Html->link(__('詳細'), ['action' => 'view', $manager->id]) ?>
                      <?= $this->Html->link(__('編集'), ['action' => 'edit', $manager->id]) ?>
                      <?= $this->Form->postLink(__('削除'), ['action' => 'delete', $manager->id], ['confirm' => __('本当に削除してよろしいですか？ # {0}?', $manager->id)]) ?>
                  </td>
                </tr>
              <?php endforeach;?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
    </div>
