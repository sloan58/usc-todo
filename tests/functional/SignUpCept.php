<?php 

$I = new FunctionalTester($scenario);
$I->am('a guest');
$I->wantTo('sign up for a USC Todo account');


$I->amOnPage('/');
$I->click('Register');
$I->seeCurrentUrlEquals('/auth/register');

$I->fillField('name','Test');
$I->fillField('email','test@test.com');
$I->fillField('password','testtest');
$I->fillField('password_confirmation','testtest');

$I->click('Submit');

$I->seeCurrentUrlEquals('/projects');