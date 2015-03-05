<?php
use Laracasts\TestDummy\Factory;

$I = new FunctionalTester($scenario);
$I->am('a USC Todo member');
$I->wantTo('post a new project');

$email = 'foo@example.com';
$password = 'foobar';

Factory::create('App\User', [
    'email' => $email,
    'password' => $password
]);

$I->amOnPage('/auth/login');
$I->fillField('email',$email);
$I->fillField('password',$password);
$I->click('Login!');

//$I->signIn();

$I->seeCurrentUrlEquals('/projects');