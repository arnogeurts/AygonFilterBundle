<?php

namespace Aygon\FilterBundle\Filter;

/**
 * @author Arno Geurts 
 */
class Url implements FilterInterface
{
    /**
     * {@inheritdoc}
     */
    public function filter($value)
    {
        if ( ! preg_match('/^http[s]?\:\/\//', $value)) {
            $value = 'http://' . $value;
        }
        return strtolower($value);
    }
    
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'url';
    }
}
