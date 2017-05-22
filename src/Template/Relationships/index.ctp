<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Relationship'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="relationships index large-9 medium-8 columns content">
    <h3><?= __('Relationships') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('friends') ?></th>
                <th scope="col"><?= $this->Paginator->sort('childclients') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($relationships as $relationship): ?>
            <tr>
                <td><?= $this->Number->format($relationship->id) ?></td>
                <td><?= h($relationship->friends) ?></td>
                <td><?= $this->Number->format($relationship->childclients) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $relationship->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $relationship->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $relationship->id], ['confirm' => __('Are you sure you want to delete # {0}?', $relationship->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
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
</div>
