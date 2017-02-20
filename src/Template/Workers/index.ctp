<?php
/**
 * @var \App\View\AppView $this
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Search') ?></li>
        <?php //$this->element('CrizSearch'); ?>
    </ul>
</nav>
<div class="cakephpCremillaLogs index large-9 medium-8 columns content">
    <h3><?= __('Cakephp Cremilla Workers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
            <th scope="col">PID</th>
            <th scope="col">Hostname</th>
            <th scope="col"><?= $this->Paginator->sort('created') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($workers as $worker): ?>
            <tr>
                <td><?= $this->Number->format($worker->id) ?></td>
                <td><?= h($worker->pid) ?></td>
                <td><?= h($worker->hostname) ?></td>
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
