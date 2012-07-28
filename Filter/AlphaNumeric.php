<?php

namespace Aygon\FilterBundle\Filter;

class Alphanumeric implements FilterInterface
{
    /**
     * {@inheritdoc}
     */
    public function filter($value)
    {
        return preg_replace('/[^A-Za-z0-9]/', '', $value);
    }
    
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'alphanumeric';
    }
}
