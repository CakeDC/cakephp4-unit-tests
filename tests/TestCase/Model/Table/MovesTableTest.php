<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MovesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MovesTable Test Case
 */
class MovesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MovesTable
     */
    public $Moves;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.moves',
        'app.users',
        'app.games',
        'app.tournaments',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::exists('Moves') ? [] : ['className' => 'App\Model\Table\MovesTable'];
        $this->Moves = TableRegistry::get('Moves', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Moves);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
