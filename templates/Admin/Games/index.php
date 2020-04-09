<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Game[]|\Cake\Collection\CollectionInterface $games
 */
?>
<div class="games index content">
    <?= $this->Html->link(__('New Game'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Games') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('best_of') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('is_player_winner') ?></th>
                    <th><?= $this->Paginator->sort('tournament_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($games as $game) : ?>
                <tr>
                    <td><?= $this->Number->format($game->id) ?></td>
                    <td><?= h($game->created) ?></td>
                    <td><?= h($game->modified) ?></td>
                    <td><?= $this->Number->format($game->best_of) ?></td>
                    <td><?= $game->has('user') ? $this->Html->link($game->user->id, ['controller' => 'Users', 'action' => 'view', $game->user->id]) : '' ?></td>
                    <td><?= h($game->is_player_winner) ?></td>
                    <td><?= $game->has('tournament') ? $this->Html->link($game->tournament->name, ['controller' => 'Tournaments', 'action' => 'view', $game->tournament->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $game->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $game->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $game->id], ['confirm' => __('Are you sure you want to delete # {0}?', $game->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
