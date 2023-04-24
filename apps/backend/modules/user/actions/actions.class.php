<?php

require_once dirname(__FILE__).'/../lib/userGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/userGeneratorHelper.class.php';

/**
 * user actions.
 *
 * @package    project
 * @subpackage user
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class userActions extends autoUserActions
{
    public function executeIndex(sfWebRequest $request)
  {
    // $q = Doctrine_Core::getTable('employee')
    // ->createQuery('c')
    // ->where('c.e_id = ?', );
    // $comments = $q->execute();
    $try = $this->getUser()->getEmployeeId();  
  }

  public function executeBlank(sfWebRequest $request)
  {
    
  }
}
