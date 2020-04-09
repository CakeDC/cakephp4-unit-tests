<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tournament $tournament
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Tournament'), ['action' => 'edit', $tournament->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Tournament'), ['action' => 'delete', $tournament->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tournament->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Tournaments'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Tournament'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tournaments view content">
            <h3><?= h($tournament->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($tournament->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Slug') ?></th>
                    <td><?= h($tournament->slug) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($tournament->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Expiration Date') ?></th>
                    <td><?= h($tournament->expiration_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($tournament->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($tournament->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Games') ?></h4>
                <?php if (!empty($tournament->games)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Best Of') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Is Player Winner') ?></th>
                            <th><?= __('Tournament Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($tournament->games as $games) : ?>
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
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Tournament Memberships') ?></h4>
                <?php if (!empty($tournament->tournament_memberships)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Tournament Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Nick') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($tournament->tournament_memberships as $tournamentMemberships) : ?>
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
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
