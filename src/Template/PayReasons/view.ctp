<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pay Reason'), ['action' => 'edit', $payReason->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pay Reason'), ['action' => 'delete', $payReason->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payReason->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pay Reasons'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pay Reason'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="payReasons view large-9 medium-8 columns content">
    <h3><?= h($payReason->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($payReason->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($payReason->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($payReason->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modifed') ?></th>
            <td><?= h($payReason->modifed) ?></td>
        </tr>
    </table>
</div>
