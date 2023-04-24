<?php

/**
 * User filter form base class.
 *
 * @package    project
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseUserFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'username'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'encryptedPassword' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'employee_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Employee'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'username'          => new sfValidatorPass(array('required' => false)),
      'encryptedPassword' => new sfValidatorPass(array('required' => false)),
      'employee_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Employee'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('user_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'User';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'username'          => 'Text',
      'encryptedPassword' => 'Text',
      'employee_id'       => 'ForeignKey',
    );
  }
}
