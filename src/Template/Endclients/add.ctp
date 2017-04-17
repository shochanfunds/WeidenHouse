<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Endclients'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="endclients form large-9 medium-8 columns content">
    <?= $this->Form->create($endclient) ?>
    <fieldset>
        <legend><?= __('Add Endclient') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('phone_number');
            echo $this->Form->control('address');
            echo $this->Form->control('capital_stock');
            echo $this->Form->control('department');
            echo $this->Form->control('charged_person');
            echo $this->Form->control('created');
            echo $this->Form->control('modified');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
