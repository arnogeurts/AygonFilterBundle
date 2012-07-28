<?php

namespace Aygon\FilterBundle\Filter;

/**
 * @author Arno Geurts 
 */
class StripTags implements FilterInterface
{
    /**
     * {@inheritdoc}
     */
    public function filter($value)
    {
        return strip_tags($value);
    }
    
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'strip_tags';
    }
}
