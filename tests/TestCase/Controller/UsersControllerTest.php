<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\UsersController;
use Cake\Auth\DefaultPasswordHasher;
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
}
