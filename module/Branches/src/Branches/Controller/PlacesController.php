<?php

namespace Branches\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;

class PlacesController extends AbstractActionController
{
    public function listJsonAction()
    {
        return new JsonModel([['id' => 1, 'description' => 'Byron Center, Michigan'], ['id' => 2, 'description' => 'Cedar Springs, Michigan']]);
    }
}
