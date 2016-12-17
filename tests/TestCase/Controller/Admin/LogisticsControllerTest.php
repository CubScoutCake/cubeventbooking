<?php
namespace App\Test\TestCase\Controller\Admin;

use App\Controller\LogisticsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Admin\LogisticsController Test Case
 */
class LogisticsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array

    public $fixtures = [
        'app.invoices',
        'app.users',
        'app.roles',
        'app.attendees',
        'app.scoutgroups',
        'app.districts',
        'app.champions',
        'app.applications',
        'app.events',
        'app.settings',
        'app.settingtypes',
        'app.discounts',
        'app.logistics',
        'app.parameters',
        'app.parameter_sets',
        'app.params',
        'app.logistic_items',
        'app.notes',
        'app.applications_attendees',
        'app.allergies',
        'app.attendees_allergies',
        'app.notifications',
        'app.notificationtypes',
        'app.invoice_items',
        'app.itemtypes',
        'app.payments',
        'app.invoices_payments'
    ];
     */
    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
