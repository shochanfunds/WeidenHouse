<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Commission Admit'), ['action' => 'edit', $commissionAdmit->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Commission Admit'), ['action' => 'delete', $commissionAdmit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $commissionAdmit->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Commission Admits'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Commission Admit'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="commissionAdmits view large-9 medium-8 columns content">
    <h3><?= h($commissionAdmit->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($commissionAdmit->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($commissionAdmit->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($commissionAdmit->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modifed') ?></th>
            <td><?= h($commissionAdmit->modifed) ?></td>
        </tr>
    </table>
</div>
