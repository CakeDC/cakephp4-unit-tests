<?php
if ($user ?? null) {
    $formatter = new \App\Utils\Formatter();
    echo $this->Html->link(__('Total won {0} vs {1} lost, {2}', $won, $lost, $formatter->formatStatPercentage($won, $lost)), '#');
}
