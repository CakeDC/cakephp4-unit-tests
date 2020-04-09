<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TournamentMembershipsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TournamentMembershipsTable Test Case
 */
class TournamentMembershipsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TournamentMembershipsTable
     */
    public $TournamentMemberships;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tournament_memberships',
        'app.tournaments',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::exists('TournamentMemberships') ? [] : ['className' => 'App\Model\Table\TournamentMembershipsTable'];
        $this->TournamentMemberships = TableRegistry::get('TournamentMemberships', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->TournamentMemberships);

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
