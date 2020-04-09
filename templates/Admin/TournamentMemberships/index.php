<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TournamentMembership[]|\Cake\Collection\CollectionInterface $tournamentMemberships
 */
?>
<div class="tournamentMemberships index content">
    <?= $this->Html->link(__('New Tournament Membership'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Tournament Memberships') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('tournament_id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('nick') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tournamentMemberships as $tournamentMembership): ?>
                <tr>
                    <td><?= $this->Number->format($tournamentMembership->id) ?></td>
                    <td><?= $tournamentMembership->has('tournament') ? $this->Html->link($tournamentMembership->tournament->name, ['controller' => 'Tournaments', 'action' => 'view', $tournamentMembership->tournament->id]) : '' ?></td>
                    <td><?= $tournamentMembership->has('user') ? $this->Html->link($tournamentMembership->user->id, ['controller' => 'Users', 'action' => 'view', $tournamentMembership->user->id]) : '' ?></td>
                    <td><?= h($tournamentMembership->nick) ?></td>
                    <td><?= h($tournamentMembership->created) ?></td>
                    <td><?= h($tournamentMembership->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $tournamentMembership->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tournamentMembership->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tournamentMembership->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tournamentMembership->id)]) ?>
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
