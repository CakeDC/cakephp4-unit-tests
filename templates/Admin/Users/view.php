<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users view content">
            <h3><?= h($user->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($user->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Password') ?></th>
                    <td><?= h($user->password) ?></td>
                </tr>
                <tr>
                    <th><?= __('First Name') ?></th>
                    <td><?= h($user->first_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Name') ?></th>
                    <td><?= h($user->last_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($user->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Games Count') ?></th>
                    <td><?= $this->Number->format($user->games_count) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($user->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($user->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Active') ?></th>
                    <td><?= $user->is_active ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Superuser') ?></th>
                    <td><?= $user->is_superuser ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Games') ?></h4>
                <?php if (!empty($user->games)) : ?>
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
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Games') ?></h4>
                <?php if (!empty($user->games_won)) : ?>
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
                        <?php foreach ($user->games_won as $gamesWon) : ?>
                        <tr>
                            <td><?= h($gamesWon->id) ?></td>
                            <td><?= h($gamesWon->created) ?></td>
                            <td><?= h($gamesWon->modified) ?></td>
                            <td><?= h($gamesWon->best_of) ?></td>
                            <td><?= h($gamesWon->user_id) ?></td>
                            <td><?= h($gamesWon->is_player_winner) ?></td>
                            <td><?= h($gamesWon->tournament_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Games', 'action' => 'view', $gamesWon->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Games', 'action' => 'edit', $gamesWon->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Games', 'action' => 'delete', $gamesWon->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gamesWon->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Moves') ?></h4>
                <?php if (!empty($user->moves)) : ?>
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
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Tournament Memberships') ?></h4>
                <?php if (!empty($user->tournament_memberships)) : ?>
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
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
