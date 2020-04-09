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
            <?= $this->Html->link(__('List Moves'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="moves form content">
            <?= $this->Form->create($move) ?>
            <fieldset>
                <legend><?= __('Add Move') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
                    echo $this->Form->control('game_id', ['options' => $games, 'empty' => true]);
                    echo $this->Form->control('player_move');
                    echo $this->Form->control('computer_move');
                    echo $this->Form->control('is_player_winner');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
