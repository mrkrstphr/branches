<?php
/**
 *
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 *
 */
class LoginController extends AbstractActionController
{
    /**
     *
     */
    public function indexAction()
    {
        $form = $this->getServiceLocator()->get('LoginForm');

        return new ViewModel(
            array(
                'form' => $form
            )
        );
    }
}
