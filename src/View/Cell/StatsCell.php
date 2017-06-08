<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Stats cell
 */
class StatsCell extends Cell
{

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Default display method.
     *
     * @param $user
     * @return void
     */
    public function display($user)
    {
        $this->loadModel('Games');
        $won = 0;
        $lost = 0;
        if ($user) {
            $won = $this->Games->find('owner', ['userId' => $user['id']])
                ->find('won')
                ->count();
            $lost = $this->Games->find('owner', ['userId' => $user['id']])
                ->find('lost')
                ->count();
        }
        $this->set(compact('won', 'lost', 'user'));
    }
}