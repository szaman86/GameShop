<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NewsletterUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NewsletterUsersTable Test Case
 */
class NewsletterUsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\NewsletterUsersTable
     */
    public $NewsletterUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.newsletter_users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('NewsletterUsers') ? [] : ['className' => 'App\Model\Table\NewsletterUsersTable'];
        $this->NewsletterUsers = TableRegistry::get('NewsletterUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->NewsletterUsers);

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
