<div class="users form">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('User Login') ?></legend>
        <?= $this->Form->control('email') ?>
        <?= $this->Form->control('password') ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')); ?>
    <?= $this->Form->end() ?>
</div>
