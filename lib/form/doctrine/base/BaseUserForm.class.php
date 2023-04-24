<?php

/**
 * User form base class.
 *
 * @method User getObject() Returns the current form's model object
 *
 * @package    project
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseUserForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'username'          => new sfWidgetFormInputText(),
      'encryptedPassword' => new sfWidgetFormInputText(),
      'employee_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Employee'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'username'          => new sfValidatorString(array('max_length' => 40)),
      'encryptedPassword' => new sfValidatorString(array('max_length' => 100)),
      'employee_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Employee'))),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'User', 'column' => array('username'))),
        new sfValidatorDoctrineUnique(array('model' => 'User', 'column' => array('employee_id'))),
      ))
    );

    $this->widgetSchema->setNameFormat('user[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'User';
  }

}
