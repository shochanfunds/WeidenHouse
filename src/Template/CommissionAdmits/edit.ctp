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
                ['action' => 'delete', $commissionAdmit->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $commissionAdmit->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Commission Admits'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="commissionAdmits form large-9 medium-8 columns content">
    <?= $this->Form->create($commissionAdmit) ?>
    <fieldset>
        <legend><?= __('Edit Commission Admit') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('modifed');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
