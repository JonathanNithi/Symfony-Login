<?php

/**
 * sfGuardSecurityUser tests.
 */
include "/../lib/vendor/symfony/lib/storage/sfStorage.class.php";
include "/../lib/vendor/symfony/lib/storage/sfSessionStorage.class.php";
include "/../lib/vendor/symfony/lib/validator/sfValidatorBase.class.php";
include "/../lib/vendor/symfony/lib/config/sfConfig.class.php";
include "/../lib/vendor/symfony/lib/validator/sfValidatorError.class.php";
include "/../lib/vendor/symfony/lib/validator/sfValidatorErrorSchema.class.php";
include "/../lib/vendor/symfony/lib/user/sfSecurityUser.class.php";
include "/../lib/vendor/symfony/lib/event_dispatcher/sfEventDispatcher.php";
include "/../lib/vendor/symfony/lib/user/sfUser.class.php";
include "/../lib/vendor/symfony/lib/user/sfBasicSecurityUser.class.php";
include "/../plugins/sfDoctrineGuardPlugin/lib/validator/sfGuardValidatorUser.class.php";
include "/../plugins/sfDoctrineGuardPlugin/lib/user/sfGuardSecurityUser.class.php";

class MockUser extends sfGuardSecurityUser
{
  public
    //$active   = true,
    $username = 'mock',
    //$emailAddress = 'mock@example.com',
    $password = 'correct',
    $employee_id = '00001';

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

class sfGuardSecurityUserTest extends \PHPUnit\Framework\TestCase{

    
    

}


