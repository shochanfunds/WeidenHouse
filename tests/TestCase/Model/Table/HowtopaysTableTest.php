<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HowtopaysTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HowtopaysTable Test Case
 */
class HowtopaysTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\HowtopaysTable
     */
    public $Howtopays;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.howtopays'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Howtopays') ? [] : ['className' => 'App\Model\Table\HowtopaysTable'];
        $this->Howtopays = TableRegistry::get('Howtopays', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Howtopays);

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
