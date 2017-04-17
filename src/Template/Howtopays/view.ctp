<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Howtopay'), ['action' => 'edit', $howtopay->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Howtopay'), ['action' => 'delete', $howtopay->id], ['confirm' => __('Are you sure you want to delete # {0}?', $howtopay->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Howtopays'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Howtopay'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="howtopays view large-9 medium-8 columns content">
    <h3><?= h($howtopay->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($howtopay->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($howtopay->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($howtopay->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($howtopay->modified) ?></td>
        </tr>
    </table>
</div>
