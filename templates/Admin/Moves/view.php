<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Move'), ['action' => 'edit', $move->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Move'), ['action' => 'delete', $move->id], ['confirm' => __('Are you sure you want to delete # {0}?', $move->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Moves'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Move'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Games'), ['controller' => 'Games', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Game'), ['controller' => 'Games', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="moves view large-9 medium-8 columns content">
    <h3><?= h($move->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $move->has('user') ? $this->Html->link($move->user->id, ['controller' => 'Users', 'action' => 'view', $move->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Game') ?></th>
            <td><?= $move->has('game') ? $this->Html->link($move->game->id, ['controller' => 'Games', 'action' => 'view', $move->game->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Player Move') ?></th>
            <td><?= h($move->player_move) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Computer Move') ?></th>
            <td><?= h($move->computer_move) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($move->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($move->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($move->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Player Winner') ?></th>
            <td><?= $move->is_player_winner ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
