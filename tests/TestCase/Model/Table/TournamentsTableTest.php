<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TournamentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TournamentsTable Test Case
 */
class TournamentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TournamentsTable
     */
    public $Tournaments;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tournaments',
        'app.games',
        'app.users',
        'app.moves',
        'app.tournament_memberships',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::exists('Tournaments') ? [] : ['className' => 'App\Model\Table\TournamentsTable'];
        $this->Tournaments = TableRegistry::get('Tournaments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Tournaments);

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
}
