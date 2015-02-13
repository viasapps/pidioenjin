<?php
use Way\Tests\Factory;

class UserTest extends TestCase {

    public function testConfideIsLoaded()
    {
    	$this->assertTrue(class_exists('Confide'), 'Confide is not loaded');

    	$response = $this->call('GET', 'user/login');

    	$this->assertResponseOk();
    }

    private function populateUser()
    {
        $this->confide_user->username = 'uname';
        $this->confide_user->password = '123123';
        $this->confide_user->email = 'mail@sample.com';
        $this->confide_user->confirmation_code = '456456';
        $this->confide_user->confirmed = true;
    }

    public function testMadMimiIntegration()
    {
    	$user = Factory::create('user');
    }

}