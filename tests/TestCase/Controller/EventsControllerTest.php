<?php
namespace App\Test\TestCase\Controller;

use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\EventsController Test Case
 */
class EventsControllerTest extends IntegrationTestCase
{

    public $fixtures = [
        'app.allergies',
        'app.application_statuses',
        'app.applications',
        'app.attendees',
        'app.attendees_allergies',
        'app.auth_roles',
        'app.champions',
        'app.discounts',
        'app.districts',
        'app.email_response_types',
        'app.email_responses',
        'app.email_sends',
        'app.event_statuses',
        'app.event_types',
        'app.events',
        'app.invoice_items',
        'app.invoices',
        'app.invoices_payments',
        'app.item_types',
        'app.logistic_items',
        'app.logistics',
        'app.notes',
        'app.notification_types',
        'app.notifications',
        'app.parameter_sets',
        'app.parameters',
        'app.params',
        'app.password_states',
        'app.payments',
        'app.prices',
        'app.reservation_statuses',
        'app.reservations',
        'app.roles',
        'app.scoutgroups',
        'app.section_types',
        'app.sections',
        'app.setting_types',
        'app.settings',
        'app.users',
        'app.sessions',
    ];

    /**
     * Test index method
     *
     * @return void
     *
     * @throws
     */
    public function testIndex()
    {
        $this->session([
           'Auth.User.id' => 1,
           'Auth.User.auth_role_id' => 2
        ]);

        $this->get('/events');

        $this->assertResponseOk();
    }

    /**
     * Test edit method
     *
     * @return void
     *
     * @throws
     */
    public function testBookGet()
    {
        $this->session([
           'Auth.User.id' => 1,
           'Auth.User.auth_role_id' => 2
        ]);

        $this->get('/events/book/2');

        $this->assertResponseOk();
    }

    /**
     * Test edit method
     *
     * @return void
     *
     * @throws
     */
    public function testBookPost()
    {
        $this->session([
            'Auth.User.id' => 1,
            'Auth.User.auth_role_id' => 2
        ]);

        $this->enableCsrfToken();
        $this->enableSecurityToken();

        $this->post('/events/book/2', ['section' => 1, 'non_section' => 2, 'leaders' => 3, 'booking_type' => 'list']);
        $this->assertRedirect(['controller' => 'Applications', 'action' => 'simple_book', 2, '?' => ['section' => 1, 'non_section' => 2, 'leaders' => 3]]);

        $this->post('/events/book/2', ['section' => 1, 'non_section' => 2, 'leaders' => 3, 'booking_type' => 'hold']);
        $this->assertRedirect(['controller' => 'Applications', 'action' => 'hold_book', 2, '?' => ['section' => 1, 'non_section' => 2, 'leaders' => 3]]);
    }

    /**
     * Test edit method
     *
     * @return void
     *
     * @throws
     */
    public function testBookPostLimits()
    {
        $this->session([
            'Auth.User.id' => 1,
            'Auth.User.auth_role_id' => 2
        ]);

        $events = $this->getTableLocator()->get('Events');

        /** @var \App\Model\Entity\Event $limitedEvent */

        $limitedEvent = $events->get(3, ['contain' => 'Prices']);

        $this->assertTrue($limitedEvent->max);
        $this->assertEquals(2, $limitedEvent->max_apps);
        foreach ($limitedEvent->prices as $price) {
            if ($price->item_type_id == 2) {
                $this->assertEquals(5, $price->max_number);
            }
        }

        $this->enableCsrfToken();
        $this->enableSecurityToken();
        $this->enableRetainFlashMessages();

        $this->post('/events/book/3', ['section' => 6, 'non_section' => 2, 'leaders' => 3]);

        $this->assertNoRedirect();
        $this->assertFlashElement('Flash/error');
        $this->assertFlashMessage('Booking Exceeds Maximum Numbers.');

        $this->post('/events/book/3', ['section' => 5, 'non_section' => 2, 'leaders' => 3, 'booking_type' => 'list']);
        $this->assertRedirect(['controller' => 'Applications', 'action' => 'simple_book', 3, '?' => ['section' => 5, 'non_section' => 2, 'leaders' => 3]]);

        $this->post('/events/book/3', ['section' => 5, 'non_section' => 2, 'leaders' => 3, 'booking_type' => 'hold']);
        $this->assertRedirect(['controller' => 'Applications', 'action' => 'hold_book', 3, '?' => ['section' => 5, 'non_section' => 2, 'leaders' => 3]]);

        $limitedEvent->set('max_apps', 1);
        $limitedEvent = $events->save($limitedEvent);

        $this->assertEquals(1, $limitedEvent->max_apps);

        $this->post('/events/book/3', ['section' => 5, 'non_section' => 2, 'leaders' => 3, 'booking_type' => 'list']);
        $this->assertNoRedirect();
        $this->assertFlashElement('Flash/error');
        $this->assertFlashMessage('This event is Full.');
    }
}
