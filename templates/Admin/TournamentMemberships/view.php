<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TournamentMembership $tournamentMembership
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Tournament Membership'), ['action' => 'edit', $tournamentMembership->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Tournament Membership'), ['action' => 'delete', $tournamentMembership->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tournamentMembership->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Tournament Memberships'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Tournament Membership'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tournamentMemberships view content">
            <h3><?= h($tournamentMembership->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Tournament') ?></th>
                    <td><?= $tournamentMembership->has('tournament') ? $this->Html->link($tournamentMembership->tournament->name, ['controller' => 'Tournaments', 'action' => 'view', $tournamentMembership->tournament->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $tournamentMembership->has('user') ? $this->Html->link($tournamentMembership->user->id, ['controller' => 'Users', 'action' => 'view', $tournamentMembership->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Nick') ?></th>
                    <td><?= h($tournamentMembership->nick) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($tournamentMembership->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($tournamentMembership->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($tournamentMembership->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
