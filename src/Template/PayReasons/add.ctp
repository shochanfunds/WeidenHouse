<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Pay Reasons'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="payReasons form large-9 medium-8 columns content">
    <?= $this->Form->create($payReason) ?>
    <fieldset>
        <legend><?= __('Add Pay Reason') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('modifed');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
