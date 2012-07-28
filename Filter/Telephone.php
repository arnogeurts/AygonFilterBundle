<?php

namespace Aygon\FilterBundle\Filter;

/**
 * @author Arno Geurts 
 */
class Telephone extends Numeric
{
    /**
     * The default prefix for telephone numbers
     * @var integer
     */
    private $defaultPrefix;
    
    /**
     * Constructor
     * 
     * @param integer $defaultPrefix 
     */
    public function __construct($defaultPrefix)
    {
        $this->defaultPrefix = $defaultPrefix;
    }
    
    /**
     * {@inheritdoc}
     */
    public function filter($value)
    {
        if ($value[0] == '+') { // check for like +31..
            $prefix = substr($value, 1, 2);
            $main = substr($value, 3);
        } elseif (substr($value, 0, 2) == '00') { // check for like 0031
            $prefix = substr($value, 2, 2);
            $main = substr($value, 4);
        } elseif ($value[0] == '0') { // default, like 06..
            $prefix = $this->defaultPrefix;
            $main = substr($value, 1);
        } else {
            return $value;
        }
        
        $value = ($prefix == $this->defaultPrefix ? '0' : '00'.$prefix) . $main;
        
        return parent::filter($value);
    }
    
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'telephone';
    }
}
