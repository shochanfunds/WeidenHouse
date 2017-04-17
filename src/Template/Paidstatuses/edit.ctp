<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $paidstatus->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $paidstatus->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Paidstatuses'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="paidstatuses form large-9 medium-8 columns content">
    <?= $this->Form->create($paidstatus) ?>
    <fieldset>
        <legend><?= __('Edit Paidstatus') ?></legend>
        <?php
            echo $this->Form->control('status_name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
