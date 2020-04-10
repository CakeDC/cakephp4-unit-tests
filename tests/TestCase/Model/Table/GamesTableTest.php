<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GamesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GamesTable Test Case
 */
class GamesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\GamesTable
     */
    protected $Games;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Games',
        'app.Users',
        'app.Tournaments',
        'app.Moves',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Games') ? [] : ['className' => GamesTable::class];
        $this->Games = TableRegistry::getTableLocator()->get('Games', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Games);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test current method
     *
     * @return void
     */
    public function testCurrent(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test findOwner method
     *
     * @return void
     */
    public function testFindOwner(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test checkFinished method
     *
     * @return void
     */
    public function testCheckFinished(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test findWon method
     *
     * @return void
     */
    public function testFindWon(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test findLost method
     *
     * @return void
     */
    public function testFindLost(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test afterSave method
     *
     * @return void
     */
    public function testAfterSave(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test findPlayed method
     *
     * @return void
     */
    public function testFindPlayed(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
