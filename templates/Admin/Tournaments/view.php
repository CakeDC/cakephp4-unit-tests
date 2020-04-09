<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tournament'), ['action' => 'edit', $tournament->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tournament'), ['action' => 'delete', $tournament->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tournament->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tournaments'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tournament'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Games'), ['controller' => 'Games', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Game'), ['controller' => 'Games', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tournament Memberships'), ['controller' => 'TournamentMemberships', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tournament Membership'), ['controller' => 'TournamentMemberships', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tournaments view large-9 medium-8 columns content">
    <h3><?= h($tournament->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($tournament->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($tournament->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Expiration Date') ?></th>
            <td><?= h($tournament->expiration_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($tournament->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($tournament->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Games') ?></h4>
        <?php if (!empty($tournament->games)): ?>
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
            <?php foreach ($tournament->games as $games): ?>
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
        <h4><?= __('Related Tournament Memberships') ?></h4>
        <?php if (!empty($tournament->tournament_memberships)): ?>
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
            <?php foreach ($tournament->tournament_memberships as $tournamentMemberships): ?>
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
