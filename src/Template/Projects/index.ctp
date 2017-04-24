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
          <p class="clients-title">プロジェクト一覧</p>
          <table id="account-list" class="table">
            <thead>
                <tr><th>id</th><th>プロジェクト名</th><th>実施日</th><th>作成日</th><th>修正日</th><th>操作</th><tr>
            </thead>
            <tbody>
              <?php foreach ($projects as $project): ?>
              <tr>
                <td><?= $this->Number->format($project->id) ?></td>
                <td><?= h($project->name) ?></td>
                <td><?= h($project->dateof) ?></td>
                <td><?= h($project->created) ?></td>
                <td><?= h($project->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('詳細'), ['action' => 'view', $project->id]) ?>
                    <?= $this->Html->link(__('編集'), ['action' => 'edit', $project->id]) ?>
                    <?= $this->Form->postLink(__('削除'), ['action' => 'delete', $project->id], ['confirm' => __('Are you sure you want to delete # {0}?', $project->id)]) ?>
                </td>
              </tr>
              <?php endforeach; ?>
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
