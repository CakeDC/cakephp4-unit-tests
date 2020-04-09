<?php
/**
 * @var \App\View\AppView $this
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tournament Membership'), ['action' => 'edit', $tournamentMembership->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tournament Membership'), ['action' => 'delete', $tournamentMembership->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tournamentMembership->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tournament Memberships'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tournament Membership'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tournaments'), ['controller' => 'Tournaments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tournament'), ['controller' => 'Tournaments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tournamentMemberships view large-9 medium-8 columns content">
    <h3><?= h($tournamentMembership->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Tournament') ?></th>
            <td><?= $tournamentMembership->has('tournament') ? $this->Html->link($tournamentMembership->tournament->name, ['controller' => 'Tournaments', 'action' => 'view', $tournamentMembership->tournament->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $tournamentMembership->has('user') ? $this->Html->link($tournamentMembership->user->id, ['controller' => 'Users', 'action' => 'view', $tournamentMembership->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nick') ?></th>
            <td><?= h($tournamentMembership->nick) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($tournamentMembership->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($tournamentMembership->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($tournamentMembership->modified) ?></td>
        </tr>
    </table>
</div>
