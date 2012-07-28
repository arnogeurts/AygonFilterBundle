<?php

namespace Aygon\FilterBundle\Filter;

/**
 * @author Arno Geurts 
 */
class LowerCase implements FilterInterface
{
    /**
     * {@inheritdoc}
     */
    public function filter($value)
    {
        return strtolower($value);
    }
    
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'lower_case';
    }
}
