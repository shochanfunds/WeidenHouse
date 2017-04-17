<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Howtopay'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="howtopays index large-9 medium-8 columns content">
    <h3><?= __('Howtopays') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($howtopays as $howtopay): ?>
            <tr>
                <td><?= $this->Number->format($howtopay->id) ?></td>
                <td><?= h($howtopay->name) ?></td>
                <td><?= h($howtopay->created) ?></td>
                <td><?= h($howtopay->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $howtopay->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $howtopay->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $howtopay->id], ['confirm' => __('Are you sure you want to delete # {0}?', $howtopay->id)]) ?>
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
