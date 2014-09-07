<?php

namespace Branches\Controller;

use Branches\Form\Authentication\LoginForm;
use Zend\Mvc\Controller\AbstractActionController;

/**
 * Class LoginController
 * @package Branches\Controller
 */
class LoginController extends AbstractActionController
{
    /**
     * @return array|\Zend\Http\Response
     */
    public function loginAction()
    {
        $this->layout('layout/login');

        $loginForm = new LoginForm();

        $redirect = false;
        if ($this->params()->fromQuery('redirect')) {
            $redirect = $this->params()->fromQuery('redirect');
        }

        if ($this->getRequest()->isPost()) {
            $loginForm->setData($this->getRequest()->getPost());
            if ($loginForm->isValid()) {
                $adapter = $this->getServiceLocator()->get(
                    'Branches\Service\Authentication\Adapter\UserRepositoryAdapter'
                );
                $adapter->setIdentity($loginForm->getData()['email']);
                $adapter->setCredential($loginForm->getData()['password']);

                $login = $this->getServiceLocator()->get('Branches\Service\Authentication');

                $result = $login->authenticate($adapter);

                if ($result->isValid()) {
                    return $this->redirect()->toUrl($redirect ?: '/');
                }

                $loginForm->setIsValid(false);
                $loginForm->get('email')->setMessages($result->getMessages());
            }
        }

        return [
            'loginForm' => $loginForm
        ];
    }

    /**
     * @return \Zend\Http\Response
     */
    public function logoutAction()
    {
        $this->getServiceLocator()->get('Branches\Service\Authentication')->clearIdentity();
        return $this->redirect()->toRoute('login');
    }
}
