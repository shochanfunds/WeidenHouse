<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="clearfix all_wrapper">
  <?php echo $this->element('sidebar');?>
  <div class="container-fluid col-md-10 clients">
        <div>
          <p class="clients-title">カテゴリ一覧</p>
          <table class="table">
            <thead>
              <tr><th>id</th><th>カテゴリ名</th><th>操作</th></tr>
            </thead>
            <tbody>
              <?php foreach ($categories as $category): ?>
              <tr>
                  <td><?= $this->Number->format($category->id) ?></td>
                  <td><?= h($category->name) ?></td>
                  <td class="actions">
                      <?= $this->Html->link(__('編集'), ['action' => 'edit', $category->id]) ?>
                      <?= $this->Form->postLink(__('削除'), ['action' => 'delete', $category->id], ['confirm' => __('本当に削除してもよろしいですか？ # {0}?', $category->id)]) ?>
                  </td>
              </tr>
              <?php endforeach; ?>
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
