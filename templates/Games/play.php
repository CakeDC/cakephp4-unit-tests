<?php
echo $this->Html->tag('h3', __('Game started {0}', $this->Time->timeAgoInWords($currentGame['created'])));
$playerMoveUrl = [
    'controller' => 'Moves',
    'action' => 'playerMove',
];
//@diy refactor into helper
$availableMoves = \Cake\Core\Configure::read('Moves.PlayerMoves');
foreach ($availableMoves as $playerMoveDisplay => $playerMove) {
    echo $this->Form->postButton(__('Pick {0}', $playerMoveDisplay), $playerMoveUrl, [
        'data' => [
            'game_id' => $currentGame['id'],
            'player_move' => $playerMove,
        ],
    ]);
}
echo '<table>';
echo $this->Html->tableHeaders([
    __('Round'),
    __('Player Move'),
    __('Computer Move'),
    __('Winner'),
]);
collection($currentGame->get('moves'))->each(function ($move, $index) {
    echo $this->Html->tableCells([
        [$index, $move['player_move'], $move['computer_move'], $move['winner']],
    ]);
});
echo '</table>';
