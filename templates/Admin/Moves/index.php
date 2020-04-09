<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Move[]|\Cake\Collection\CollectionInterface $moves
 */
?>
<div class="moves index content">
    <?= $this->Html->link(__('New Move'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Moves') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('game_id') ?></th>
                    <th><?= $this->Paginator->sort('player_move') ?></th>
                    <th><?= $this->Paginator->sort('computer_move') ?></th>
                    <th><?= $this->Paginator->sort('is_player_winner') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($moves as $move) : ?>
                <tr>
                    <td><?= $this->Number->format($move->id) ?></td>
                    <td><?= $move->has('user') ? $this->Html->link($move->user->id, ['controller' => 'Users', 'action' => 'view', $move->user->id]) : '' ?></td>
                    <td><?= $move->has('game') ? $this->Html->link($move->game->id, ['controller' => 'Games', 'action' => 'view', $move->game->id]) : '' ?></td>
                    <td><?= h($move->player_move) ?></td>
                    <td><?= h($move->computer_move) ?></td>
                    <td><?= h($move->is_player_winner) ?></td>
                    <td><?= h($move->created) ?></td>
                    <td><?= h($move->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $move->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $move->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $move->id], ['confirm' => __('Are you sure you want to delete # {0}?', $move->id)]) ?>
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
