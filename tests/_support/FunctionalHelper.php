<?php
namespace Codeception\Module;

use Laracasts\TestDummy\Factory as TestDummy;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

class FunctionalHelper extends \Codeception\Module
{

    /*
     * Sign In Cepts
     */
    public function signIn()
    {

        $email = 'foo@example.com';
        $password = 'foobar';

        $this->haveAnAccount(compact('email','password'));

        $I = $this->getModule('Laravel5');

        $I->amOnPage('/auth/login');
        $I->fillField('email',$email);
        $I->fillField('password',$password);
        $I->click('Login!');


    }

    public function haveAnAccount($overrides = [])
    {

        $this->have('App\User',$overrides);

    }

    public function have($model, $overrides = [])
    {

        return TestDummy::create($model,$overrides);

    }


}
