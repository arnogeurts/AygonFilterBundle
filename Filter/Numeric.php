<?php

namespace Aygon\FilterBundle\Filter;

/**
 * @author Arno Geurts 
 */
class Numeric implements FilterInterface
{
    /**
     * {@inheritdoc}
     */
    public function filter($value)
    {
        return preg_replace('/[^0-9]/', '', $value);
    }
    
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'numeric';
    }
}
