<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SexesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SexesTable Test Case
 */
class SexesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SexesTable
     */
    public $Sexes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sexes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Sexes') ? [] : ['className' => 'App\Model\Table\SexesTable'];
        $this->Sexes = TableRegistry::get('Sexes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Sexes);

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
