<?php

namespace Aygon\FilterBundle\Filter;

/**
 * @author Arno Geurts 
 */
interface FilterInterface
{
    /**
     * Filter a given value 
     * 
     * @param mixed $value
     * @return mixed
     */
    public function filter($value);
    
    /**
     * Get the name of this filter
     * 
     * @return string 
     */
    public function getName();
}
