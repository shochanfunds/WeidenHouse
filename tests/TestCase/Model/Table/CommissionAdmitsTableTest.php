<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CommissionAdmitsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CommissionAdmitsTable Test Case
 */
class CommissionAdmitsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CommissionAdmitsTable
     */
    public $CommissionAdmits;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.commission_admits'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CommissionAdmits') ? [] : ['className' => 'App\Model\Table\CommissionAdmitsTable'];
        $this->CommissionAdmits = TableRegistry::get('CommissionAdmits', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CommissionAdmits);

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
