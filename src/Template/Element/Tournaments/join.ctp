<?php
$row = [$tournament->get('name')];
if ($tournament->get('tournament_memberships') && !$tournament->getErrors()) {
    $row[] = $this->Html->link(__('Play a game'), [
        'prefix' => false,
        'controller' => 'Tournaments',
        'action' => 'play',
        $tournament->get('id'),
    ]);
} else {
    $url = [
        'action' => 'join',
        $tournament->get('id'),
    ];
    $td = $this->Form->create($tournament, [
        'url' => $url,
    ]);
    $td .= $this->Form->control('tournament_memberships.0.nick');
    $td .= $this->Form->submit(__('Join'), [
        'class' => 'join-tournament',
        'data-url' => $this->Url->build($url),
    ]);
    $td .= $this->Form->end();
    $row[] = $td;
}
echo $this->Html->tableCells($row, ['class' => 'tournament-row'], ['class' => 'tournament-row']);