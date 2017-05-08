<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Clients Project'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="clientsProjects index large-9 medium-8 columns content">
    <h3><?= __('Clients Projects') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('clients_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('projects_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clientsProjects as $clientsProject): ?>
            <tr>
                <td><?= $this->Number->format($clientsProject->id) ?></td>
                <td><?= $clientsProject->has('client') ? $this->Html->link($clientsProject->client->first_name . $clientsProject->client->last_name, ['controller' => 'Clients', 'action' => 'view', $clientsProject->client->id]) : '' ?></td>
                <td><?= $clientsProject->has('project') ? $this->Html->link($clientsProject->project->name, ['controller' => 'Projects', 'action' => 'view', $clientsProject->project->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $clientsProject->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $clientsProject->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $clientsProject->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clientsProject->id)]) ?>
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
