<?php
/**
 * @var \App\View\AppView $this
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Tournament Membership'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tournaments'), ['controller' => 'Tournaments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tournament'), ['controller' => 'Tournaments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tournamentMemberships index large-9 medium-8 columns content">
    <h3><?= __('Tournament Memberships') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tournament_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nick') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tournamentMemberships as $tournamentMembership) : ?>
            <tr>
                <td><?= $this->Number->format($tournamentMembership->id) ?></td>
                <td><?= $tournamentMembership->has('tournament') ? $this->Html->link($tournamentMembership->tournament->name, ['controller' => 'Tournaments', 'action' => 'view', $tournamentMembership->tournament->id]) : '' ?></td>
                <td><?= $tournamentMembership->has('user') ? $this->Html->link($tournamentMembership->user->id, ['controller' => 'Users', 'action' => 'view', $tournamentMembership->user->id]) : '' ?></td>
                <td><?= h($tournamentMembership->nick) ?></td>
                <td><?= h($tournamentMembership->created) ?></td>
                <td><?= h($tournamentMembership->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tournamentMembership->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tournamentMembership->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tournamentMembership->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tournamentMembership->id)]) ?>
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
