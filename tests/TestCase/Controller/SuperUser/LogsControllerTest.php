<?php
/**
 * CakePHP DatabaseLog Plugin
 *
 * Licensed under The MIT License.
 *
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 * @link https://github.com/dereuromark/CakePHP-DatabaseLog
 */
namespace App\TestCase\Controller\SuperUser;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\IntegrationTestCase;

/**
 * @coversDefaultClass LogsController
 */
class LogsControllerTest extends IntegrationTestCase
{

    /**
     * @var \DatabaseLog\Model\Table\DatabaseLogsTable
     */
    protected $Logs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.database_log.database_logs',
        'app.logs',
        'core.sessions',
        //'app.users',
        //'app.districts',
        //'app.scoutgroups',
        //'app.sections',
        //'app.section_types',
        'app.auth_roles',
    ];

    /**
     * Setup
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();

        $this->Logs = TableRegistry::get('DatabaseLog.DatabaseLogs');
        if (!$this->Logs->find()->count()) {
            $this->Logs->log('warning', 'Foo Warning', ['x' => 'y']);
        }
    }

    /**
     * Tests the index action
     *
     * @return void
     */
    public function testIndex()
    {
        $this->session([
           'Auth.User.id' => 1,
           'Auth.User.auth_role_id' => 2
        ]);

        $this->get(['prefix' => 'super_user', 'controller' => 'Logs']);

        $this->assertResponseNotEmpty();
        $this->assertResponseCode(200);
    }

    /**
     * Tests the view action
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestSkipped('Travis Error Unreproducible');
        $this->session([
            'Auth.User.id' => 1,
            'Auth.User.auth_role_id' => 2
        ]);

        $this->get(['prefix' => 'super_user', 'controller' => 'Logs', 'action' => 'view', '1']);

        $this->assertResponseNotEmpty();
        $this->assertResponseCode(200);
    }

    /**
     * Tests the delete action without POST
     *
     * @return void
     */
    public function testDeleteWithoutPost()
    {
        $this->markTestSkipped('Travis Error Unreproducible');
        $this->session([
            'Auth.User.id' => 1,
            'Auth.User.auth_role_id' => 2
        ]);

        $this->get(['prefix' => 'super_user', 'controller' => 'Logs', 'action' => 'delete', '1']);

        $this->assertNoRedirect();
        $this->assertResponseCode(405);
    }

    /**
     * Tests the delete action
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestSkipped('Travis Error Unreproducible');
        $countInitial = $this->Logs->find()->count();

        $this->session([
            'Auth.User.id' => 1,
            'Auth.User.auth_role_id' => 2
        ]);

        $this->enableCsrfToken();
        $this->enableSecurityToken();

        $this->post(
            ['prefix' => 'super_user', 'controller' => 'Logs', 'action' => 'delete', 1]
        );
        $count = $this->Logs->find()->count();

        $this->assertSame(($countInitial - 1), $count);
    }

    /**
     * Tests the reset action without POST
     *
     * @return void
     */
    public function testResetWithoutPost()
    {
        $this->markTestSkipped('Travis Error Unreproducible');
        $this->session([
            'Auth.User.id' => 1,
            'Auth.User.auth_role_id' => 2
        ]);

        $this->get(['prefix' => 'super_user', 'controller' => 'Logs', 'action' => 'reset']);

        $this->assertNoRedirect();
        $this->assertResponseCode(405);
    }

    /**
     * Tests the remove duplicates action
     *
     * @return void
     */
    public function testRemoveDuplicates()
    {
        $this->markTestSkipped('Travis Error Unreproducible');
        $countInitial = $this->Logs->find()->count();

        $this->session([
            'Auth.User.id' => 1,
            'Auth.User.auth_role_id' => 2
        ]);

        $this->enableCsrfToken();
        $this->enableSecurityToken();

        $this->post(['prefix' => 'super_user', 'controller' => 'Logs', 'action' => 'removeDuplicates']);

        $count = $this->Logs->find()->count();

        $logged = $this->Logs->find()->where(['type' => 'info', 'message' => 'Duplicate Logs Removed'])->count();

        $this->assertGreaterThanOrEqual(1, $logged);

        $count = $count - $logged;

        $this->assertLessThan($countInitial, $count);
    }

    /**
     * Tests the reset action
     *
     * @return void
     */
    public function testReset()
    {
        $this->markTestSkipped('Travis Error Unreproducible');
        $this->session([
            'Auth.User.id' => 1,
            'Auth.User.auth_role_id' => 2
        ]);

        $count = $this->Logs->find()->count();

        $this->assertGreaterThanOrEqual(1, $count);

        $this->enableCsrfToken();
        $this->enableSecurityToken();

        $this->post(['prefix' => 'super_user', 'controller' => 'Logs', 'action' => 'reset']);

        $this->assertResponseSuccess();
        $this->assertRedirect();

        $count = $this->Logs->find()->count();

        $this->assertSame(0, $count);
    }
}
