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
                ['action' => 'delete', $tournamentMembership->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $tournamentMembership->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Tournament Memberships'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Tournaments'), ['controller' => 'Tournaments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tournament'), ['controller' => 'Tournaments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tournamentMemberships form large-9 medium-8 columns content">
    <?= $this->Form->create($tournamentMembership) ?>
    <fieldset>
        <legend><?= __('Edit Tournament Membership') ?></legend>
        <?php
            echo $this->Form->control('tournament_id', ['options' => $tournaments]);
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('nick');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
