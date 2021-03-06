<?php
use Migrations\AbstractSeed;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $this->call('DistrictsSeed');
        $this->call('ScoutgroupsSeed');
        $this->call('RolesSeed');
        $this->call('AuthRolesSeed');
        $this->call('SectionTypesSeed');
        $this->call('SectionsSeed');
        $this->call('PasswordStatesSeed');

        $data = [
            [
                'id' => '1',
                'role_id' => '2',
                'section_id' => '1',
                'firstname' => 'Jacob',
                'lastname' => 'Tyler',
                'email' => 'jacob@hertscubs.com',
                'password' => 'TestMe',
                'digest_hash' => 'b517225d7899cbd7d4c675b053d8f444',
                'pw_salt' => 'dev.hertscubs.uk',
                'api_key_plain' => 'a key',
                'api_key' => 'a key.P6JDH982',
                'phone' => 'NUMBER HERE',
                'address_1' => 'ADDRESS 1',
                'address_2' => '',
                'city' => 'ADDRESS 2',
                'county' => 'COUNTY',
                'postcode' => 'POSTCODE',
                'created' => '2015-08-01 21:38:23',
                'modified' => '2016-11-02 23:41:16',
                'username' => 'Jacob',
                'osm_user_id' => '000',
                'osm_secret' => '000',
                'osm_section_id' => '000',
                'osm_linked' => '3',
                'osm_linkdate' => '2016-10-09 06:28:03',
                'osm_current_term' => '000',
                'osm_term_end' => '2016-12-31 00:00:00',
                'pw_reset' => null,
                'last_login' => '2016-12-11 15:11:02',
                'logins' => '0',
                'validated' => null,
                'deleted' => null,
                'auth_role_id' => '3',
                'password_state_id' => 1,
            ]
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
