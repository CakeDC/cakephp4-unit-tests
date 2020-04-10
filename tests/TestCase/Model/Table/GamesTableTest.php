<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Entity\Game;
use App\Model\Entity\User;
use App\Model\Table\GamesTable;
use Cake\ORM\Query;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Cake\Utility\Text;

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
    public function testCurrentShouldReturnAGame()
    {
        $game = $this->Games->current(1);
        $this->assertInstanceOf(Game::class, $game);
        $this->assertSame(10, $game->id);
        $this->assertCount(0, $game->moves);
    }

    /**
     * Test current method
     *
     * @return void
     */
    public function testCurrentShouldReturnNull()
    {
        $game = $this->Games->current(2);
        $this->assertNull($game);
    }

    /**
     * Test findOwner method
     *
     * @return void
     */
    public function testFindOwnerShouldThrowException(): void
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
        $this->expectException(\OutOfBoundsException::class);
        $this->expectExceptionMessage('Option userId is required');
        $this->Games->find('owner');
    }

    /**
     * Test findOwner method
     *
     * @return void
     */
    public function testFindOwnerShouldReturnQuery(): void
    {
        // using another strategy, generators
        $generatedUser = $this->Games->Users->save(new User([
            'email' => Text::uuid() . '@example.com',
            'password' => 'password',
            'games' => [
                new Game([
                    'best_of' => 3,
                ]),
            ],
        ]));

        $query = $this->Games->find('owner', ['userId' => $generatedUser->id]);
        $this->assertInstanceOf(Query::class, $query);
        $this->assertSame(1, $query->count());
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
