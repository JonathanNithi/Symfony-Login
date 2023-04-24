<?php

/**
 * sf_guard_user filter form base class.
 *
 * @package    project
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class Basesf_guard_userFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'e_id'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fname'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'lname'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'address' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'e_id'    => new sfValidatorPass(array('required' => false)),
      'fname'   => new sfValidatorPass(array('required' => false)),
      'lname'   => new sfValidatorPass(array('required' => false)),
      'address' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sf_guard_user_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'sf_guard_user';
  }

  public function getFields()
  {
    return array(
      'id'      => 'Number',
      'e_id'    => 'Text',
      'fname'   => 'Text',
      'lname'   => 'Text',
      'address' => 'Text',
    );
  }
}
