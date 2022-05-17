<?php

namespace App\Form;


use Symfony\Component\Form\AbstractType;

class ApplicationType extends AbstractType
{
    /**
     * 
     * @param string $label
     * @param string $placehlder
     * @param array $options
     * @return array 
     */
    protected function getGonfiguration($label, $placehlder, $options = [])
    {
        return array_merge([
            'label' => $label,
            'attr' => [
                'placeholder' => $placehlder
            ]
        ], $options);
    }
}
