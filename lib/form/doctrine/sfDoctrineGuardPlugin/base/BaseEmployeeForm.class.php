<?php

/**
 * Employee form base class.
 *
 * @method Employee getObject() Returns the current form's model object
 *
 * @package    project
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseEmployeeForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'      => new sfWidgetFormInputHidden(),
      'e_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => false)),
      'fname'   => new sfWidgetFormInputText(),
      'lname'   => new sfWidgetFormInputText(),
      'address' => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'      => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'e_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'))),
      'fname'   => new sfValidatorString(array('max_length' => 255)),
      'lname'   => new sfValidatorString(array('max_length' => 255)),
      'address' => new sfValidatorString(array('max_length' => 1000)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Employee', 'column' => array('e_id')))
    );

    $this->widgetSchema->setNameFormat('employee[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Employee';
  }

}
