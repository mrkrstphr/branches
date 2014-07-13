<?php

namespace Branches\View\Helper;

use Zend\Form\View\Helper\AbstractHelper;
use Zend\View\Model\ModelInterface;

/**
 * Class ViewBasedJsHelper
 * @package Branches\View\Helper
 */
class ViewBasedJsHelper extends AbstractHelper
{
    /**
     * @param ModelInterface $model
     */
    public function __invoke(ModelInterface $model)
    {
        $baseDir = dirname($_SERVER['SCRIPT_FILENAME']);
        $this->recurseJs($model, $baseDir);
    }

    /**
     * @param ModelInterface $model
     * @param string $baseDir
     */
    protected function recurseJs(ModelInterface $model, $baseDir)
    {
        foreach ($model->getChildren() as $viewModel) {
            $js = '/js/application/view';
            if (substr($viewModel->getTemplate(), 0, 1) != '/') {
                $js .= '/';
            }
            $js .= $viewModel->getTemplate() . '.js';

            if (file_exists($baseDir . $js)) {
                $this->appendJs($js);
            }

            if ($viewModel->getChildren()) {
                $this->recurseJs($viewModel, $baseDir);
            }

            // JS specifically called out by the action:
            if ($viewModel->getVariable('javascript')) {
                foreach ($viewModel->getVariable('javascript') as $js) {
                    $this->appendJs($js);
                }
            }
        }
    }

    /**
     * @param string $file
     */
    protected function appendJs($file)
    {
        $this->getView()->headScript()->appendFile($file, 'text/javascript');
    }
}
