<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Move $move
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Move'), ['action' => 'edit', $move->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Move'), ['action' => 'delete', $move->id], ['confirm' => __('Are you sure you want to delete # {0}?', $move->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Moves'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Move'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="moves view content">
            <h3><?= h($move->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $move->has('user') ? $this->Html->link($move->user->id, ['controller' => 'Users', 'action' => 'view', $move->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Game') ?></th>
                    <td><?= $move->has('game') ? $this->Html->link($move->game->id, ['controller' => 'Games', 'action' => 'view', $move->game->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Player Move') ?></th>
                    <td><?= h($move->player_move) ?></td>
                </tr>
                <tr>
                    <th><?= __('Computer Move') ?></th>
                    <td><?= h($move->computer_move) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($move->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($move->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($move->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Player Winner') ?></th>
                    <td><?= $move->is_player_winner ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
