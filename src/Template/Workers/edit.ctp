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
                ['action' => 'delete', $cakephpCremillaWorker->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $cakephpCremillaWorker->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Cakephp Cremilla Workers'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="cakephpCremillaWorkers form large-9 medium-8 columns content">
    <?= $this->Form->create($cakephpCremillaWorker) ?>
    <fieldset>
        <legend><?= __('Edit Cakephp Cremilla Worker') ?></legend>
        <?php
            echo $this->Form->control('pid');
            echo $this->Form->control('hostname');
            echo $this->Form->control('queue');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
