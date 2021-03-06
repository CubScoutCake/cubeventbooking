<?php
namespace App\Controller\Register;

use App\Controller\Register\AppController;
use Cake\ORM\TableRegistry;

//use Cake\Mailer\MailerAwareTrait;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

    /**
     * Register Function
     *
     * @param null $sectionId The ID of the Section Selected.
     * @return \Cake\Http\Response|void
     */
    public function register($sectionId = null)
    {
        $this->viewBuilder()->setLayout('outside');

        if (!isset($sectionId) || is_null($sectionId)) {
            $this->redirect(['controller' => 'Sections', 'prefix' => 'register', 'action' => 'select']);
        }

        $user = $this->Users->newEntity();
        $user->set('section_id', $sectionId);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $data = array_merge($data, [
                'auth_role_id' => 1,
                'password_state_id' => 1,
                'section_id' => $sectionId,
            ]);

            $user = $this->Users->patchEntity($user, $data, [
                'fieldList' => [
                    'role_id',
                    'section_id',
                    'password_state_id',
                    'auth_role_id',
                    'firstname',
                    'lastname',
                    'username',
                    'membership_number',
                    'email',
                    'password',
                    'phone',
                    'address_1',
                    'address_2',
                    'city',
                    'county',
                    'postcode', ]
            ]);

            if ($this->Users->save($user)) {
                $atts = TableRegistry::getTableLocator()->get('Attendees');

                $att = $atts->newEntity();

                $attendeeData = [
                    'user_id' => $user->id,
                    'firstname' => $user->firstname,
                    'lastname' => $user->lastname,
                    'address_1' => $user->address_1,
                    'address_2' => $user->address_2,
                    'city' => $user->city,
                    'county' => $user->county,
                    'user_attendee' => true,
                    'postcode' => $user->postcode,
                    'role_id' => $user->role_id,
                    'section_id' => $user->section_id,
                    'phone' => $user->phone
                ];

                $att = $atts->patchEntity($att, $attendeeData);

                if ($atts->save($att)) {
                    $this->Flash->success(__('An Attendee for your user has been created.'));
                }

                $this->Auth->setUser($user->toArray());

                $this->Flash->success(__('You have successfully registered!'));

                return $this->redirect(['controller' => 'Landing', 'action' => 'user_home', 'prefix' => false]);
            } else {
                $this->Flash->error(__('The user could not be registered. There may be an error. Please, try again.'));
            }
        }

        $roles = $this->Users->Roles->find('nonAuto')->find('leaders')->find('list', ['limit' => 200]);
        $sections = $this->Users->Sections->find(
            'list',
            [
                'keyField' => 'id',
                'valueField' => 'section',
                'groupField' => 'scoutgroup.district.district'
            ]
        )
            ->contain(['Scoutgroups.Districts']);

        $this->set(compact('user', 'roles', 'sections'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Before Filter Function
     *
     * @param \Cake\Event\Event $event The Event to be modified
     * @return void
     */
    public function beforeFilter(\Cake\Event\Event $event)
    {
        $this->Auth->allow(['register']);
    }
}
