<?php
echo $this->Html->tag('h2', __('Tournament stats'));
$values = $stats->toArray() ?? [];
echo '<dl>';
collection($values)->each(function ($value, $name) {
    echo $this->Html->tag('dt', \Cake\Utility\Inflector::humanize($name));
    echo $this->Html->tag('dd', h($value));
});
echo '</dl>';