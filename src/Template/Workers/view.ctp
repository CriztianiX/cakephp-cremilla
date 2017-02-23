<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Cakephp Cremilla Worker'), ['action' => 'edit', $cakephpCremillaWorker->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cakephp Cremilla Worker'), ['action' => 'delete', $cakephpCremillaWorker->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cakephpCremillaWorker->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cakephp Cremilla Workers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cakephp Cremilla Worker'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="cakephpCremillaWorkers view large-9 medium-8 columns content">
    <h3><?= h($cakephpCremillaWorker->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Hostname') ?></th>
            <td><?= h($cakephpCremillaWorker->hostname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Queue') ?></th>
            <td><?= h($cakephpCremillaWorker->queue) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($cakephpCremillaWorker->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pid') ?></th>
            <td><?= $this->Number->format($cakephpCremillaWorker->pid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($cakephpCremillaWorker->created) ?></td>
        </tr>
    </table>
</div>
