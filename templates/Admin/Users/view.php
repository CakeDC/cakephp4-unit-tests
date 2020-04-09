<?php
/**
 * @var \App\View\AppView $this
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Games'), ['controller' => 'Games', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Game'), ['controller' => 'Games', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Moves'), ['controller' => 'Moves', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Move'), ['controller' => 'Moves', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tournament Memberships'), ['controller' => 'TournamentMemberships', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tournament Membership'), ['controller' => 'TournamentMemberships', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('First Name') ?></th>
            <td><?= h($user->first_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Name') ?></th>
            <td><?= h($user->last_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Active') ?></th>
            <td><?= $user->is_active ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Superuser') ?></th>
            <td><?= $user->is_superuser ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Games') ?></h4>
        <?php if (!empty($user->games)) : ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Best Of') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Is Player Winner') ?></th>
                <th scope="col"><?= __('Tournament Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->games as $games) : ?>
            <tr>
                <td><?= h($games->id) ?></td>
                <td><?= h($games->created) ?></td>
                <td><?= h($games->modified) ?></td>
                <td><?= h($games->best_of) ?></td>
                <td><?= h($games->user_id) ?></td>
                <td><?= h($games->is_player_winner) ?></td>
                <td><?= h($games->tournament_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Games', 'action' => 'view', $games->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Games', 'action' => 'edit', $games->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Games', 'action' => 'delete', $games->id], ['confirm' => __('Are you sure you want to delete # {0}?', $games->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Moves') ?></h4>
        <?php if (!empty($user->moves)) : ?>
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
            <?php foreach ($user->moves as $moves) : ?>
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
    <div class="related">
        <h4><?= __('Related Tournament Memberships') ?></h4>
        <?php if (!empty($user->tournament_memberships)) : ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Tournament Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Nick') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->tournament_memberships as $tournamentMemberships) : ?>
            <tr>
                <td><?= h($tournamentMemberships->id) ?></td>
                <td><?= h($tournamentMemberships->tournament_id) ?></td>
                <td><?= h($tournamentMemberships->user_id) ?></td>
                <td><?= h($tournamentMemberships->nick) ?></td>
                <td><?= h($tournamentMemberships->created) ?></td>
                <td><?= h($tournamentMemberships->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'TournamentMemberships', 'action' => 'view', $tournamentMemberships->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'TournamentMemberships', 'action' => 'edit', $tournamentMemberships->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'TournamentMemberships', 'action' => 'delete', $tournamentMemberships->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tournamentMemberships->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
