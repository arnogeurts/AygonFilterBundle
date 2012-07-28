<?php

namespace Aygon\FilterBundle\Filter;

/**
 * @author Arno Geurts 
 */
class UpperCase implements FilterInterface
{
    /**
     * {@inheritdoc}
     */
    public function filter($value)
    {
        return strtoupper($value);
    }
    
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'upper_case';
    }
}
