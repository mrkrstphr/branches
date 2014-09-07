<?php

namespace Branches\Service\Authentication;

use Zend\Http\Request;
use Zend\Mvc\MvcEvent;

/**
 * Class AuthenticationHandler
 * @package Branches\Service\Authentication
 */
class AuthenticationHandler
{
    public function onRequestEvent(MvcEvent $event)
    {
        $routeMatch = $event->getRouteMatch();
        $login = $event->getApplication()->getServiceManager()->get('Branches\Service\Authentication');

        if ($login->hasIdentity()) {
            $userRepository = $event->getApplication()->getServiceManager()->get('Branches\Repository\UserRepository');
            $login->getStorage()->write($userRepository->getById($login->getIdentity()->getId()));
        }

        if (!$login->hasIdentity() && $routeMatch->getParam('controller') != 'Branches\Controller\Login') {
            $request = $event->getRequest();
            $response = $event->getResponse();

            if ($request instanceof Request and $request->isXmlHttpRequest()) {
                $response->setContent('<!--logout-->');
            } else {
                $redirect = '';
                if (!$request->isPost() and $request->getRequestUri() != '/') {
                    $redirect .= '?redirect=' . $request->getRequestUri();
                }

                $router = $event->getRouter();
                $url = $router->assemble([], ['name' => 'login']);

                $response->setStatusCode(302);
                $response->getHeaders()->addHeaderLine('Location', $url . $redirect);
            }

            return $response;
        } else if ($login->hasIdentity() and $routeMatch->getMatchedRouteName() == 'login') {
            $response = $event->getResponse()->setStatusCode(302);
            $response->getHeaders()->addHeaderLine('Location', '/');

            return $response;
        }

        return null;
    }
}
