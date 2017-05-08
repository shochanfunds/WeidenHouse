<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ClientsProjectsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ClientsProjectsTable Test Case
 */
class ClientsProjectsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ClientsProjectsTable
     */
    public $ClientsProjects;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.clients_projects',
        'app.clients',
        'app.paidstatuses',
        'app.managers',
        'app.statuses',
        'app.howtopays',
        'app.projects',
        'app.commission_admits',
        'app.sexes',
        'app.pay_reasons',
        'app.endclients',
        'app.categories'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ClientsProjects') ? [] : ['className' => 'App\Model\Table\ClientsProjectsTable'];
        $this->ClientsProjects = TableRegistry::get('ClientsProjects', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ClientsProjects);

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
