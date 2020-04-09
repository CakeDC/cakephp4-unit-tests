<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Game'), ['action' => 'edit', $game->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Game'), ['action' => 'delete', $game->id], ['confirm' => __('Are you sure you want to delete # {0}?', $game->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Games'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Game'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tournaments'), ['controller' => 'Tournaments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tournament'), ['controller' => 'Tournaments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Moves'), ['controller' => 'Moves', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Move'), ['controller' => 'Moves', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="games view large-9 medium-8 columns content">
    <h3><?= h($game->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $game->has('user') ? $this->Html->link($game->user->id, ['controller' => 'Users', 'action' => 'view', $game->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tournament') ?></th>
            <td><?= $game->has('tournament') ? $this->Html->link($game->tournament->name, ['controller' => 'Tournaments', 'action' => 'view', $game->tournament->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($game->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Best Of') ?></th>
            <td><?= $this->Number->format($game->best_of) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($game->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($game->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Player Winner') ?></th>
            <td><?= $game->is_player_winner ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Moves') ?></h4>
        <?php if (!empty($game->moves)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Game Id') ?></th>
                <th scope="col"><?= __('Player Move') ?></th>
                <th scope="col"><?= __('Computer Move') ?></th>
                <th scope="col"><?= __('Is Player Winner') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($game->moves as $moves): ?>
            <tr>
                <td><?= h($moves->id) ?></td>
                <td><?= h($moves->user_id) ?></td>
                <td><?= h($moves->game_id) ?></td>
                <td><?= h($moves->player_move) ?></td>
                <td><?= h($moves->computer_move) ?></td>
                <td><?= h($moves->is_player_winner) ?></td>
                <td><?= h($moves->created) ?></td>
                <td><?= h($moves->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Moves', 'action' => 'view', $moves->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Moves', 'action' => 'edit', $moves->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Moves', 'action' => 'delete', $moves->id], ['confirm' => __('Are you sure you want to delete # {0}?', $moves->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
