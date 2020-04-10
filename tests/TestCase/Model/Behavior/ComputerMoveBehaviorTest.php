<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Behavior;

use App\Model\Behavior\ComputerMoveBehavior;
use App\Model\Entity\Move;
use App\Strategy\RockStrategy;
use App\Strategy\StrategyInterface;
use Cake\Core\Configure;
use Cake\ORM\Table;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Behavior\ComputerMoveBehavior Test Case
 */
class ComputerMoveBehaviorTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Behavior\ComputerMoveBehavior
     */
    protected $ComputerMoveBehavior;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->ComputerMoveBehavior = new ComputerMoveBehavior(new Table());
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ComputerMoveBehavior);

        parent::tearDown();
    }

    /**
     * Test beforeSave method
     *
     * @return void
     */
    public function testBeforeSave(): void
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
     * Test computerMove method
     *
     * @return void
     */
    public function testComputerMove(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test resolveMove method
     *
     * @return void
     */
    public function testResolveMove(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test computerMove method
     *
     * @return void
     */
    public function testComputerMovePure()
    {
        // pure unit test approach

        // mock strategy to return Paper
        $strategy = $this->getMockBuilder(StrategyInterface::class)
            ->onlyMethods(['move'])
            ->disableOriginalConstructor()
            ->getMock();
        $strategy->method('move')
            ->willReturn('P');

        $computerMoveBehavior = $this->getMockBuilder(ComputerMoveBehavior::class)
            ->onlyMethods(['resolveMove', 'getStrategy'])
            ->disableOriginalConstructor()
            ->getMock();
        $computerMoveBehavior->method('getStrategy')
            ->willReturn($strategy);
        $computerMoveBehavior->method('resolveMove')
            ->with('R', 'P')
            ->willReturn(false);

        $move = $computerMoveBehavior->computerMove(new Move([
            'id' => 1,
            'user_id' => 1,
            'game_id' => 1,
            'player_move' => 'R',
            'computer_move' => null,
            'is_player_winner' => null,
            'created' => '2019-02-22 10:57:59',
            'modified' => '2019-02-22 10:57:59',
        ]));

        $this->assertSame('R', $move->player_move);
        $this->assertSame('P', $move->computer_move);
    }

    public function testComputerMoveIntegration(): void
    {
        // Integration approach
        Configure::write('ComputerMoveBehavior.StrategyClass', RockStrategy::class);
        $move = $this->ComputerMoveBehavior->computerMove(new Move([
            'id' => 1,
            'user_id' => 1,
            'game_id' => 1,
            'player_move' => 'P',
            'computer_move' => null,
            'is_player_winner' => null,
            'created' => '2019-02-22 10:57:59',
            'modified' => '2019-02-22 10:57:59',
        ]));
        $this->assertSame('R', $move->computer_move);
        $this->assertSame(true, $move->is_player_winner);
    }
}
