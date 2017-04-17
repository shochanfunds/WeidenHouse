<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Endclient'), ['action' => 'edit', $endclient->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Endclient'), ['action' => 'delete', $endclient->id], ['confirm' => __('Are you sure you want to delete # {0}?', $endclient->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Endclients'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Endclient'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="endclients view large-9 medium-8 columns content">
    <h3><?= h($endclient->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($endclient->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone Number') ?></th>
            <td><?= h($endclient->phone_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($endclient->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($endclient->id) ?></td>
        </tr>
    </table>
</div>
