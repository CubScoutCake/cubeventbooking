<?php
namespace App\Test\TestCase\Controller\Admin;

use App\Controller\Admin\AttendeesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Admin\AttendeesController Test Case
 */
class AttendeesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.attendees',
        'app.users',
        'app.roles',
        'app.scoutgroups',
        'app.districts',
        'app.champions',
        'app.applications',
        'app.events',
        'app.applications_attendees',
        'app.sections',
        'app.auth_roles',
        'app.section_types',
        'app.settings',
        'app.settingtypes',
        'app.discounts',
        'app.event_types',
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->session([
           'Auth.User.id' => 1,
           'Auth.User.auth_role_id' => 2
        ]);

        $this->get('/admin/attendees');

        $this->assertResponseOk();
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
     * Test adult method
     *
     * @return void
     */
    public function testAdult()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test cub method
     *
     * @return void
     */
    public function testCub()
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

    /**
     * Test isAuthorized method
     *
     * @return void
     */
    public function testIsAuthorized()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
