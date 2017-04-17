<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sex'), ['action' => 'edit', $sex->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sex'), ['action' => 'delete', $sex->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sex->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sexes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sex'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sexes view large-9 medium-8 columns content">
    <h3><?= h($sex->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($sex->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($sex->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($sex->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($sex->modified) ?></td>
        </tr>
    </table>
</div>
