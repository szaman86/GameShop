<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GenresCustomersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GenresCustomersTable Test Case
 */
class GenresCustomersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\GenresCustomersTable
     */
    public $GenresCustomers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.genres_customers',
        'app.genres',
        'app.products',
        'app.publishers',
        'app.customers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('GenresCustomers') ? [] : ['className' => 'App\Model\Table\GenresCustomersTable'];
        $this->GenresCustomers = TableRegistry::get('GenresCustomers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->GenresCustomers);

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
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
