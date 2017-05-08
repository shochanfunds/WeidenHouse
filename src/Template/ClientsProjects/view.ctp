<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Clients Project'), ['action' => 'edit', $clientsProject->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Clients Project'), ['action' => 'delete', $clientsProject->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clientsProject->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Clients Projects'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Clients Project'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="clientsProjects view large-9 medium-8 columns content">
    <h3><?= h($clientsProject->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Client') ?></th>
            <td><?= $clientsProject->has('client') ? $this->Html->link($clientsProject->client->id, ['controller' => 'Clients', 'action' => 'view', $clientsProject->client->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Project') ?></th>
            <td><?= $clientsProject->has('project') ? $this->Html->link($clientsProject->project->name, ['controller' => 'Projects', 'action' => 'view', $clientsProject->project->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($clientsProject->id) ?></td>
        </tr>
    </table>
</div>
