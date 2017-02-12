<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Cakephp Cremilla Log'), ['action' => 'edit', $cakephpCremillaLog->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cakephp Cremilla Log'), ['action' => 'delete', $cakephpCremillaLog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cakephpCremillaLog->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cakephp Cremilla Logs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cakephp Cremilla Log'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="cakephpCremillaLogs view large-9 medium-8 columns content">
    <h3><?= h($cakephpCremillaLog->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($cakephpCremillaLog->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($cakephpCremillaLog->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($cakephpCremillaLog->created) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Message') ?></h4>
        <?= $this->Text->autoParagraph(h($cakephpCremillaLog->message)); ?>
    </div>
    <div class="row">
        <h4><?= __('Context') ?></h4>
        <?= $this->Text->autoParagraph(h($cakephpCremillaLog->context)); ?>
    </div>
</div>
