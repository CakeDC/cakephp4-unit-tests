<?php
echo $this->Html->tag('h2', __('Create a new game'));
echo $this->Form->create($game, ['url' => ['action' => 'create']]);
echo $this->Form->control('best_of', ['type' => 'number']);
echo $this->Form->submit();
echo $this->Form->end();
