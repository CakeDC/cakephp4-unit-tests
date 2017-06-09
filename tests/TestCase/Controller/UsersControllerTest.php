<?php
namespace App\Test\TestCase\Controller;

use App\Controller\UsersController;
use Cake\Auth\DefaultPasswordHasher;
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
}