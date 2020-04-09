<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $tournament->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $tournament->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Tournaments'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Games'), ['controller' => 'Games', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Game'), ['controller' => 'Games', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tournament Memberships'), ['controller' => 'TournamentMemberships', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tournament Membership'), ['controller' => 'TournamentMemberships', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tournaments form large-9 medium-8 columns content">
    <?= $this->Form->create($tournament) ?>
    <fieldset>
        <legend><?= __('Edit Tournament') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('expiration_date', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
