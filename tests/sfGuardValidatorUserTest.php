<?php

/**
 * sfGuardValidatorUser tests.
 */

include "/../lib/vendor/symfony/lib/validator/sfValidatorBase.class.php";
include "/../lib/vendor/symfony/lib/config/sfConfig.class.php";
include "/../lib/vendor/symfony/lib/validator/sfValidatorError.class.php";
include "/../lib/vendor/symfony/lib/validator/sfValidatorErrorSchema.class.php";
include "/../plugins/sfDoctrineGuardPlugin/lib/validator/sfGuardValidatorUser.class.php";

class MockUser
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

class sfGuardValidatorUserTest extends \PHPUnit\Framework\TestCase{

  public function testValidationWithCorrectUsernameAndPassword(){
    
    $validator = new TestValidator();

    $activeUser = new MockUser();
    

    MockTable::$user = $activeUser;

    $values = ['username' => 'mock', 'password' => 'correct'];
    $result = $validator->clean($values);

    $this->assertArrayHasKey('user', $result);
    $this->assertInstanceOf(MockUser::class, $result['user']);
  }

  public function testValidationWithCorrectUsernameAndWrongPassword(){

    $validator = new TestValidator();

    $activeUser = new MockUser();

    MockTable::$user = $activeUser;

    try {
      $validator->clean(array('username' => 'mock', 'password' => 'incorrect'));
      $this->fail('clean method should throw an error if password is incorrect');
      } catch (sfValidatorErrorSchema $error) {
          $this->assertTrue(true, 'clean method throws an error if password is incorrect');
      }
  }
  
  public function testValidationWithWrongUsernameAndCorrectPassword(){

    $validator = new TestValidator();

    $activeUser = new MockUser();

    MockTable::$user = $activeUser;

    try {
      $validator->clean(array('username' => 'different_mock', 'password' => 'correct'));
      $this->fail('clean method should throw an error if password is incorrect');
      } catch (sfValidatorErrorSchema $error) {
          $this->assertTrue(true, 'clean method throws an error if password is incorrect');
      }
  }

  public function testValidationWithNullUsernameAndNullPassword(){

    $validator = new TestValidator();

    $activeUser = new MockUser();

    MockTable::$user = $activeUser;

    try {
      $validator->clean(array('username' => null, 'password' => null));
      $this->fail('clean method should throw an error if no username is provided');
    } catch (sfValidatorErrorSchema $error) {
      $this->assertTrue(true, 'clean method throws an error if no username is provided');
      $this->assertArrayHasKey('username', $error, 'clean method throws a "username" error if no username is provided');
      $this->assertEquals('invalid', $error['username']->getCode(), 'clean method throws an "invalid" error if no username is provided');
    }
  }


  public function testValidationWithThrowGlobalErrorSetToTrue(){

    $validator = new TestValidator();
    
    $activeUser = new MockUser();

    MockTable::$user = $activeUser;

    try {
      $validator->setOption('throw_global_error', true);
      $validator->clean(array('username' => null, 'password' => null));
      $this->fail('clean method should throw a global error if the "throw_global_error" option is true');
    } catch (sfValidatorErrorSchema $error) {
        $this->fail('clean method should throw a global error if the "throw_global_error" option is true');
    } catch (sfValidatorError $error) {
        $this->assertTrue(true, 'clean method throws a global error if the "throw_global_error" option is true');
    }
  }

}


