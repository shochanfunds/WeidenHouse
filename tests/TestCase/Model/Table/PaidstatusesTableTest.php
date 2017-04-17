<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PaidstatusesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PaidstatusesTable Test Case
 */
class PaidstatusesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PaidstatusesTable
     */
    public $Paidstatuses;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.paidstatuses'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Paidstatuses') ? [] : ['className' => 'App\Model\Table\PaidstatusesTable'];
        $this->Paidstatuses = TableRegistry::get('Paidstatuses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Paidstatuses);

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
}
