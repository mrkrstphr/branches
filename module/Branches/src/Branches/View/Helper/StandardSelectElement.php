<?php

namespace Branches\View\Helper;

use Zend\Form\Form;
use Zend\Form\View\Helper\AbstractHelper;

/**
 * Class StandardSelectElement
 * @package Branches\View\Helper
 */
class StandardSelectElement extends AbstractHelper
{
    public function __invoke(Form $form, $path)
    {
        $paths = explode('.', $path);

        $element = $form;

        foreach ($paths as $path) {
            $element = $element->get($path);
        }

        $element->setAttribute('class', 'form-control');

        $hasError = !empty($element->getMessages());

        $html = '<div class="form-group' . ($hasError ? ' has-error has-feedback' : '') . '">' .
            $this->getView()->formLabel($element) .
            $this->getView()->formSelect($element) .
            $this->getView()->formElementErrors($element, ['class' => 'form-errors']) .
            '</div>';

        return $html;
    }
}
