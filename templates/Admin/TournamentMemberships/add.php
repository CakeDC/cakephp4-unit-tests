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
            <?= $this->Html->link(__('List Tournament Memberships'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tournamentMemberships form content">
            <?= $this->Form->create($tournamentMembership) ?>
            <fieldset>
                <legend><?= __('Add Tournament Membership') ?></legend>
                <?php
                    echo $this->Form->control('tournament_id', ['options' => $tournaments]);
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('nick');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
