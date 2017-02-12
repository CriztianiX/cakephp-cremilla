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
                ['action' => 'delete', $cakephpCremillaLog->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $cakephpCremillaLog->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Cakephp Cremilla Logs'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="cakephpCremillaLogs form large-9 medium-8 columns content">
    <?= $this->Form->create($cakephpCremillaLog) ?>
    <fieldset>
        <legend><?= __('Edit Cakephp Cremilla Log') ?></legend>
        <?php
            echo $this->Form->input('type');
            echo $this->Form->input('message');
            echo $this->Form->input('context');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
