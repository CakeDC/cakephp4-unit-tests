<?php
echo $this->Html->tag('h2', __('Tournaments'));
echo '<table class="tournaments">';
echo $this->Html->tableHeaders([
    __('Name'),
    __('Action'),
]);
$tournaments->each(function ($tournament) {
    echo $this->element('Tournaments/join', ['tournament' => $tournament]);
});
echo '</table>';
echo $this->Html->script('Tournaments/index', ['block' => 'script']);