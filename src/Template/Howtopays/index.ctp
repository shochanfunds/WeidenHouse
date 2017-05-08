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


          <p class="clients-title">支払い方法</p>
          <table class="table">
            <thead>
              <tr><th>id</th><th>支払い方法</th><th>登録日</th><th>修正日</th><th>操作</th><tr>
            </thead>
            <tbody>
              <?php foreach($howtopays as $howtopay):?>
                  <tr>
                    <td><?= $this->Number->format($howtopay->id) ?></td>
                    <td><?= h($howtopay->name) ?></td>
                    <td><?= h($howtopay->created) ?></td>
                    <td><?= h($howtopay->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('編集'), ['action' => 'edit', $howtopay->id]) ?>
                        <?= $this->Form->postLink(__('削除'), ['action' => 'delete', $howtopay->id], ['confirm' => __('本当に削除してもよろしいですか？ # {0}?', $howtopay->id)]) ?>
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
