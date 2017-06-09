<?php
namespace App\Test\TestCase\Controller;

use App\Controller\UsersController;
use App\Strategy\RockStrategy;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Core\Configure;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\IntegrationTestCase;
use Cake\Utility\Hash;

/**
 * App\Controller\UsersController Test Case
 */
class UsersControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.users',
        'app.games',
        'app.moves',
    ];

    /**
     * Test register method
     *
     * @return void
     */
    public function testRegister()
    {
        $email = 'john@example.com';
        $usersTable = TableRegistry::get('Users');
        $this->assertCount(0, $usersTable->findByEmail($email));
        $data = [
            'first_name' => 'John',
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
        $this->assertSame('John', $user['first_name']);
        $this->assertSame('Smith', $user['last_name']);
        $this->assertSame($email, $user['email']);
    }

    /**
     * Test register method
     *
     * @return void
     */
    public function testRegisterDuplicatedEmail()
    {
        $email = 'admin@example.com';
        $usersTable = TableRegistry::get('Users');
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
        $this->assertSame('john', $query->firstOrFail()->get('first_name'));
    }

    public function testWinGame()
    {
        Configure::write('ComputerMoveBehavior.StrategyClass', RockStrategy::class);

        // user login happy
        $data = [
            'email' => 'admin@example.com',
            'password' => 'password',
        ];
        $this->post('/users/login', $data);
        $this->assertResponseSuccess();
        $this->assertSession('john', 'Auth.User.first_name');
        $this->assertRedirect('/games/play');

        // user is logged in at this point
        $this->session($this->_requestSession->read());
        $this->get('/games/play');
        $this->assertResponseContains('Pick Rock');

        // play Spock 1
        $data = [
            'game_id' => 1,
            'player_move' => 'K',
        ];
        $movesTable = TableRegistry::get('Moves');
        $this->assertCount(0, $movesTable->find());
        $this->post('/moves/player-move', $data);
        $this->assertCount(1, $movesTable->find());
        $gamesTable = TableRegistry::get('Games');
        $game = $gamesTable->get(1);
        $this->assertNull($game['is_player_winner']);

        // play Spock 2 and win
        $this->post('/moves/player-move', $data);
        $this->assertCount(2, $movesTable->find());
        $game = $gamesTable->get(1);
        $this->assertTrue($game['is_player_winner']);
        //read flash from _flashMessages when the view is rendered, if there is a redirect, the flash is not rendered and you get it from the requestSession instead
        $this->assertSame('You Won the game', Hash::get($this->_requestSession->read(), 'Flash.flash.0.message'));
    }
}