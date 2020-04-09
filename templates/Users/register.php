<div class="users form">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('User Registration') ?></legend>
        <?= $this->Form->control('first_name') ?>
        <?= $this->Form->control('last_name') ?>
        <?= $this->Form->control('email') ?>
        <?= $this->Form->control('password') ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')); ?>
    <?= $this->Form->end() ?>
</div>
