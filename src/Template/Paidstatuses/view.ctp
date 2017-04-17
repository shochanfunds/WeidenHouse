<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Paidstatus'), ['action' => 'edit', $paidstatus->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Paidstatus'), ['action' => 'delete', $paidstatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $paidstatus->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Paidstatuses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Paidstatus'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="paidstatuses view large-9 medium-8 columns content">
    <h3><?= h($paidstatus->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Status Name') ?></th>
            <td><?= h($paidstatus->status_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($paidstatus->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($paidstatus->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($paidstatus->modified) ?></td>
        </tr>
    </table>
</div>
