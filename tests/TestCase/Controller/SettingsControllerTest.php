<?php
namespace App\Test\TestCase\Controller;

use App\Controller\SettingsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\SettingsController Test Case
 */
class SettingsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.settings',
        'app.events',
        'app.discounts',
        'app.users',
        'app.roles',
        'app.password_states',
        'app.sections',
        'app.section_types',
        'app.scoutgroups',
        'app.districts',
        'app.auth_roles',
        'app.event_types',
        'app.setting_types'
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