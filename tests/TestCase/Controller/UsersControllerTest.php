<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\UsersController;
use App\Strategy\RockStrategy;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Core\Configure;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;
use Cake\Utility\Hash;

/**
 * App\Controller\UsersController Test Case
 *
 * @uses \App\Controller\UsersController
 */
class UsersControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Users',
        'app.Games',
        'app.Moves',
    ];

    /**
     * Test beforeFilter method
     *
     * @return void
     */
    public function testBeforeFilter(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    public function testRegister()
    {
        $this->enableCsrfToken();
        $email = 'bill@example.com';
        $usersTable = TableRegistry::getTableLocator()->get('Users');
        $this->assertCount(0, $usersTable->findByEmail($email));
        $data = [
            'first_name' => 'Bill',
            'last_name' => 'Smith',
            'email' => $email,
            'password' => 'password',
        ];
        $this->post('/users/register', $data);
        $this->assertResponseSuccess();
        $this->assertRedirect('/');
        $user = $usersTable->findByEmail($email)->firstOrFail();
        $hasher = new DefaultPasswordHasher();
        $this->assertTrue($hasher->check('password', $user['password']));
        $this->assertTrue($user['is_active']);
        $this->assertTrue($user['is_superuser']);
        $this->assertSame('Bill', $user['first_name']);
        $this->assertSame('Smith', $user['last_name']);
        $this->assertSame($email, $user['email']);
    }

    public function testRegisterDuplicatedEmail()
    {
        $this->enableCsrfToken();
        $email = 'test@example.com';
        $usersTable = TableRegistry::getTableLocator()->get('Users');
        $this->assertCount(1, $usersTable->findByEmail($email));
        $data = [
            'first_name' => 'John',
            'last_name' => 'Smith',
            'email' => $email,
            'password' => 'password',
        ];
        $this->enableRetainFlashMessages();
        $this->post('/users/register', $data);
        $this->assertResponseSuccess();
        $this->assertNoRedirect();
        $this->assertSame('Unable to register the user.', Hash::get($this->_flashMessages, 'flash.0.message'));
        $query = $usersTable->findByEmail($email);
        $this->assertCount(1, $query);
        $this->assertSame('test', $query->firstOrFail()->get('first_name'));
    }

    /**
     * Test login method
     *
     * @return void
     */
    public function testLogin(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test logout method
     *
     * @return void
     */
    public function testLogout(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    public function testWinGame()
    {
        $this->enableCsrfToken();
        Configure::write('ComputerMoveBehavior.StrategyClass', RockStrategy::class);
        // user login happy
        $data = [
            'email' => 'test2@example.com',
            'password' => 'password',
        ];
        $this->post('/users/login', $data);
        $this->assertResponseSuccess();
        $this->assertSession('test2', 'Auth.User.first_name');
        $this->assertRedirect('/');
        $this->session($_SESSION);
        // user logged in at this point
        $this->get('/games/play');
        $this->assertResponseContains('Pick Rock');
        // play Spock 1
        $data = [
            'game_id' => 20,
            'player_move' => 'K',
        ];
        $movesTable = TableRegistry::getTableLocator()->get('Moves');
        $movesCount = $movesTable->find()->count();
        $this->post('/moves/player-move', $data);
        $this->assertCount(++$movesCount, $movesTable->find());
        $gamesTable = TableRegistry::getTableLocator()->get('Games');
        $game = $gamesTable->get(20);
        $this->assertNull($game['is_player_winner']);
        // play Spock 2 and win
        $this->post('/moves/player-move', $data);
        $this->assertCount(++$movesCount, $movesTable->find());
        $game = $gamesTable->get(20);
        $this->assertTrue($game['is_player_winner']);
        //read flash from _flashMessages when the view is rendered, if there is a redirect, the flash is not rendered and you get it from the requestSession instead
        $this->assertFlashMessage('You Won the game');
    }
}
