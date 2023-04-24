<?php

/**
 * Employee filter form base class.
 *
 * @package    project
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseEmployeeFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'e_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'fname'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'lname'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'address' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'e_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('sfGuardUser'), 'column' => 'id')),
      'fname'   => new sfValidatorPass(array('required' => false)),
      'lname'   => new sfValidatorPass(array('required' => false)),
      'address' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('employee_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Employee';
  }

  public function getFields()
  {
    return array(
      'id'      => 'Number',
      'e_id'    => 'ForeignKey',
      'fname'   => 'Text',
      'lname'   => 'Text',
      'address' => 'Text',
    );
  }
}
