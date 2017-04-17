<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EndclientsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EndclientsTable Test Case
 */
class EndclientsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EndclientsTable
     */
    public $Endclients;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.endclients'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Endclients') ? [] : ['className' => 'App\Model\Table\EndclientsTable'];
        $this->Endclients = TableRegistry::get('Endclients', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Endclients);

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
