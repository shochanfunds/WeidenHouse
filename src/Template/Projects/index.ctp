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
                <tr><th>プロジェクト名</th><th>担当者名</th><th>実施日</th><th>作成日</th><th>操作</th><tr>
            </thead>
            <tbody>
              <?php foreach ($projects as $project): ?>
                <td><?= $this->Html->link($project->name,['controller'=>'projects','action'=>'view',$project->id]) ?></td>
                <td><?= $project->has('endclient') ? $this->Html->link($project->endclient->name,['controller' => 'Endclients' , 'action' => 'view', $project->endclient->id]) :''?></td>
                <td><?= h($project->dateof) ?></td>
                <td><?= h($project->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('詳細'), ['action' => 'view', $project->id]) ?>
                    <?= $this->Html->link(__('編集'), ['action' => 'edit', $project->id]) ?>
                    <?= $this->Form->postLink(__('削除'), ['controller'=>'projects','action' => 'delete', $project->id], ['confirm' => __('本当に削除してもよろしいですか？ # {0}?', $project->id)]) ?>
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
