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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $tournament->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $tournament->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Tournaments'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tournaments form content">
            <?= $this->Form->create($tournament) ?>
            <fieldset>
                <legend><?= __('Edit Tournament') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('expiration_date', ['empty' => true]);
                    echo $this->Form->control('slug');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
