<?php
use Migrations\AbstractMigration;

class AddCounterCache extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $this->table('users')
            ->addColumn('games_count', 'integer', ['null' => false, 'default' => 0])
            ->update();
    }
}
