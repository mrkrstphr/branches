<?php

namespace Branches\View\Helper;

use Zend\Form\Form;
use Zend\Form\View\Helper\AbstractHelper;

class StandardTextElement extends AbstractHelper
{
    public function __invoke(Form $form, $path, array $attributes = [])
    {
        $paths = explode('.', $path);

        $element = $form;

        foreach ($paths as $path) {
            $element = $element->get($path);
        }

        $classes = 'form-control' . (!empty($attributes['class']) ? ' ' . $attributes['class'] : '');

        $element->setAttribute('class', $classes);

        $html = '<div class="form-group">' .
            $this->getView()->formLabel($element) .
            $this->getView()->formText($element) .
            $this->getView()->formElementErrors($element, ['class' => 'form-errors']) .
            '</div>';

        return $html;
    }
}
