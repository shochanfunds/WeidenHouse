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

          <p class="clients-title">手数料差引項目一覧</p>
          <table class="table">
            <thead>
                <tr><th>id</th><th>手数料差引</th><th>作成日</th><th>修正日</th><th>操作</th><tr>
            </thead>
            <tbody>
                <?php foreach ($commissionAdmits as $commissionAdmit): ?>
                  <tr class="gray_background">
                    <td><?= $this->Number->format($commissionAdmit->id) ?></td>
                    <td><?= h($commissionAdmit->name) ?></td>
                    <td><?= h($commissionAdmit->created) ?></td>
                    <td><?= h($commissionAdmit->modifed) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $commissionAdmit->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $commissionAdmit->id], ['confirm' => __('本当に削除してもよろしいですか？ # {0}?', $commissionAdmit->id)]) ?>
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
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
