<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BranchesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BranchesTable Test Case
 */
class BranchesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BranchesTable
     */
    public $Branches;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.branches',
        'app.school_classes',
        'app.establishments',
        'app.academicyears',
        'app.terms',
        'app.branches_school_classes',
        'app.users',
        'app.groups',
        'app.school_classes_users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Branches') ? [] : ['className' => 'App\Model\Table\BranchesTable'];
        $this->Branches = TableRegistry::get('Branches', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Branches);

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
