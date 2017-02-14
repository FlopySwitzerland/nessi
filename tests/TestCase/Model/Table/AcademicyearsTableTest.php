<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AcademicyearsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AcademicyearsTable Test Case
 */
class AcademicyearsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AcademicyearsTable
     */
    public $Academicyears;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.academicyears',
        'app.establishments',
        'app.terms'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Academicyears') ? [] : ['className' => 'App\Model\Table\AcademicyearsTable'];
        $this->Academicyears = TableRegistry::get('Academicyears', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Academicyears);

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
