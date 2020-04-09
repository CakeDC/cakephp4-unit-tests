<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Game $game
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Game'), ['action' => 'edit', $game->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Game'), ['action' => 'delete', $game->id], ['confirm' => __('Are you sure you want to delete # {0}?', $game->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Games'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Game'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="games view content">
            <h3><?= h($game->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $game->has('user') ? $this->Html->link($game->user->id, ['controller' => 'Users', 'action' => 'view', $game->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Tournament') ?></th>
                    <td><?= $game->has('tournament') ? $this->Html->link($game->tournament->name, ['controller' => 'Tournaments', 'action' => 'view', $game->tournament->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($game->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Best Of') ?></th>
                    <td><?= $this->Number->format($game->best_of) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($game->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($game->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Player Winner') ?></th>
                    <td><?= $game->is_player_winner ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Moves') ?></h4>
                <?php if (!empty($game->moves)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Game Id') ?></th>
                            <th><?= __('Player Move') ?></th>
                            <th><?= __('Computer Move') ?></th>
                            <th><?= __('Is Player Winner') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($game->moves as $moves) : ?>
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
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
