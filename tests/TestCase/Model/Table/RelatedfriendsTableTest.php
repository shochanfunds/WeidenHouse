<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RelatedfriendsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RelatedfriendsTable Test Case
 */
class RelatedfriendsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RelatedfriendsTable
     */
    public $Relatedfriends;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.relatedfriends'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Relatedfriends') ? [] : ['className' => 'App\Model\Table\RelatedfriendsTable'];
        $this->Relatedfriends = TableRegistry::get('Relatedfriends', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Relatedfriends);

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
