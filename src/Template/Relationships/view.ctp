<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Relationship'), ['action' => 'edit', $relationship->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Relationship'), ['action' => 'delete', $relationship->id], ['confirm' => __('Are you sure you want to delete # {0}?', $relationship->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Relationships'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Relationship'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="relationships view large-9 medium-8 columns content">
    <h3><?= h($relationship->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Friends') ?></th>
            <td><?= h($relationship->friends) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($relationship->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Childclients') ?></th>
            <td><?= $this->Number->format($relationship->childclients) ?></td>
        </tr>
    </table>
</div>
