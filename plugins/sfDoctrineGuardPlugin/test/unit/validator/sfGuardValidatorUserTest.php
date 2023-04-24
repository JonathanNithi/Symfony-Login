<?php

/**
 * sfGuardValidatorUser tests.
 */
include dirname(__FILE__).'/../../../../../test/bootstrap/unit.php';

$t = new lime_test(7);

class MockUser
{
  public
    //$active   = true,
    $username = 'mock',
    //$emailAddress = 'mock@example.com',
    $password = 'correct';

  

  public function checkPassword($password)
  {
    return $password == $this->password;
  }
}

class MockTable
{
  static public $user = null;

  public function retrieveByUsername($username)
  {
    //return self::$user->username == $username ? self::$user : null;
    return self::$user->username == $username ? self::$user : null;
  }

}

class TestValidator extends sfGuardValidatorUser
{
  protected function getTable()
  {
    return new MockTable();
  }
}

// ->clean()
$t->diag('->clean()');

$validator = new TestValidator();

$activeUser = new MockUser();

MockTable::$user = $activeUser;

//correct username and password
try
{
  $values = $validator->clean(array('username' => 'mock', 'password' => 'correct'));

  $t->pass('->clean() does not throw an error if username and password are correct');
  $t->isa_ok($values['user'], 'MockUser', '->clean() adds the user object to the cleaned values');
}
catch (sfValidatorErrorSchema $error)
{
  $t->fail('->clean() does not throw an error if username and password are correct');
  $t->skip();
}

//correct username and wrong password
try
{
  $validator->clean(array('username' => 'mock', 'password' => 'incorrect'));
  $t->fail('->clean() throws an error if password is incorrect');
}
catch (sfValidatorErrorSchema $error)
{
  $t->pass('->clean() throws an error if password is incorrect');
}

//correct password and wrong username
try
{
  $validator->clean(array('username' => 'incorrectmock', 'password' => 'correct'));
  $t->fail('->clean() throws an error if username is incorrect');
}
catch (sfValidatorErrorSchema $error)
{
  $t->pass('->clean() throws an error if username is incorrect');
}

try
{
  $validator->clean(array('username' => null, 'password' => null));

  $t->fail('->clean() throws an error if no username is provided');
  $t->skip('', 2);
}
catch (sfValidatorErrorSchema $error)
{
  $t->pass('->clean() throws an error if no username is provided');

  $t->ok(isset($error['username']), '->clean() throws a "username" error if no username is provided');
  $t->is($error['username']->getCode(), 'invalid', '->clean() throws an "invalid" error if no username is provided');
}

$validator->setOption('throw_global_error', true);

try
{
  $validator->clean(array('username' => null, 'password' => null));
  $t->fail('->clean() throws a global error if the "throw_global_error" option is true');
}
catch (sfValidatorErrorSchema $error)
{
  $t->fail('->clean() throws a global error if the "throw_global_error" option is true');
}
catch (sfValidatorError $error)
{
  $t->pass('->clean() throws a global error if the "throw_global_error" option is true');
}


