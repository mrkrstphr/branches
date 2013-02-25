<?php
/**
 * 
 */

namespace Branches\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 *
 */
class MediaController extends AbstractActionController
{
    /**
     *
     */
    public function indexAction()
    {
        return new ViewModel();
    }
}
