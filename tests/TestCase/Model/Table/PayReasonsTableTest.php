<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PayReasonsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PayReasonsTable Test Case
 */
class PayReasonsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PayReasonsTable
     */
    public $PayReasons;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.pay_reasons'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PayReasons') ? [] : ['className' => 'App\Model\Table\PayReasonsTable'];
        $this->PayReasons = TableRegistry::get('PayReasons', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PayReasons);

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
