<?php
/**
 * @var \App\View\AppView $this
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Search') ?></li>
    </ul>

    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link('New', ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cakephpCremillaLogs index large-9 medium-8 columns content">
    <h3><?= __('Cakephp Cremilla Workers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
        <tr>
            <th scope="col">PID</th>
            <!-- <th scope="col">Hostname</th> -->
            <th scope="col">Queue</th>
            <th scope="col">Status</th>
            <th scope="col">Started At</th>            
            <th scope="col">Observed At</th>
            <th scope="col">Jobs Success</th>
            <th scope="col">Jobs Failed</th>
            <th class="actions" scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($workers as $worker): ?>
            <tr>
                <td><?= h($worker->pid) ?></td>
                <!-- <td><?= h($worker->hostname) ?></td> -->
                <td><?= h($worker->queue) ?></td>
                <td>
                    <?php if($this->CremillaWorker->isAlive($worker->pid)): ?>
                        Running
                        <?php else: ?>
                        Dead
                    <?php endif;?>
                </td>
                <td><?= $worker->created ?></td>
                <td><?= $worker->observed_at ?></td>                
                <td><?= $worker->jobs_success ?></td>
                <td><?= $worker->jobs_failed ?></td>
                <td class="actions">
                    <?= $this->Html->link('View', ['action' => 'view', $worker->id]) ?>
                    <?php if($this->CremillaWorker->isAlive($worker->pid)): ?>
                        <?= $this->Form->postLink(
                            'Stop',
                            ['action' => 'stop', $worker->pid],
                            ['confirm' => 'Are you sure?'])
                        ?>
                    <?php endif;?>
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
