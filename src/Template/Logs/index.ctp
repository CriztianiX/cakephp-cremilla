<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
    </ul>
</nav>
<div class="cakephpCremillaLogs index large-9 medium-8 columns content">
    <h3><?= __('Cakephp Cremilla Logs') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col">Message</th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cakephpCremillaLogs as $cakephpCremillaLog): ?>
            <tr>
                <td><?= $this->Number->format($cakephpCremillaLog->id) ?></td>
                <td><?= h($cakephpCremillaLog->type) ?></td>
                <td><?= h($cakephpCremillaLog->message) ?></td>
                <td><?= h($cakephpCremillaLog->created) ?></td>
                <td class="actions">
                    <?php //$this->Html->link(__('View'), ['action' => 'view', $cakephpCremillaLog->id]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
