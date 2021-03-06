<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\ORM\TableRegistry;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @property \App\Model\Table\EventsTable $Events
 */
class LandingController extends AppController
{

    /**
     * Displays a view
     *
     * @return void|\Cake\Network\Response
     * @throws \Cake\Http\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
    public function userHome()
    {
        // Get Entities from Registry
        $apps = TableRegistry::getTableLocator()->get('Applications');
        $atts = TableRegistry::getTableLocator()->get('Attendees');
        $invs = TableRegistry::getTableLocator()->get('Invoices');
        $pays = TableRegistry::getTableLocator()->get('Payments');
        $evs = TableRegistry::getTableLocator()->get('Events');

        $userId = $this->Auth->user('id');

        // Table Entities
        $applications = $apps->find('all', ['conditions' => ['Applications.user_id' => $userId]])->contain(['Events', 'Sections.Scoutgroups'])->order(['Applications.modified' => 'DESC'])->limit(5);
        $events = $evs->find('upcoming')->find('unarchived')->contain(['Settings'])->limit(3)->order(['Events.start_date' => 'DESC']);
        $invoices = $invs->find('all', ['conditions' => ['Invoices.user_id' => $userId]])->contain(['Users', 'Applications', 'Payments'])->order(['Invoices.created' => 'DESC'])->limit(5);
        $payments = $countPayments = $pays->find('all')->matching('Invoices', function ($q) {
                return $q->where(['Invoices.user_id' => $this->Auth->user('id')]);
        });

        if ($events->count() > 0) {
            $this->set(compact('events'));
        }

        // Pass to View
        $this->set(compact('applications', 'invoices', 'payments'));

        // Counts of Entities
        $countApplications = $applications->count();
        $countInvoices = $invoices->count();
        $countAttendees = $atts->find('all', ['conditions' => ['user_id' => $userId]])->count();

        if (empty($payments)) {
            $countPayments = 0;
        }

        if (!empty($payments)) {
            $countPayments = $payments->count();
        }

        // Pass to View
        $this->set(compact('countApplications', 'countAttendees', 'countInvoices', 'countPayments', 'userId'));
    }

    /**
     * @return \Cake\Http\Response|void
     */
    public function welcome()
    {
        // Set the layout.
        $this->viewBuilder()->setLayout('public');

        $this->Events = $this->getTableLocator()->get('Events');
        $events = $this->Events->find('upcoming')->contain(['EventStatuses', 'EventTypes']);
        $this->set(compact('events'));
    }

    /**
     * @param \Cake\Event\Event $event The CakePHP emissive Event
     *
     * @return \Cake\Event\Event
     */
    public function beforeFilter(\Cake\Event\Event $event)
    {
        $this->Auth->allow(['welcome']);

        return $event;
    }
}
