<?php
namespace App\Test\TestCase\Controller;

use App\Controller\SchoolClassesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\SchoolClassesController Test Case
 */
class SchoolClassesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.school_classes',
        'app.establishments',
        'app.academicyears',
        'app.terms',
        'app.branches',
        'app.branches_school_classes',
        'app.users',
        'app.groups',
        'app.school_classes_users'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
