<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Cakephp Cremilla Workers'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="cakephpCremillaWorkers form large-9 medium-8 columns content">
    <?= $this->Form->create($cakephpCremillaWorker) ?>
    <fieldset>
        <legend><?= __('Add Cakephp Cremilla Worker') ?></legend>
        <?= $this->Form->control('queue'); ?>
        <?= $this->Form->control('logger', [
            'type' => 'select',
            'options' => [ 'stdout'  => 'stdout', 'cremilla' => 'cremilla' ]
        ]); ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
