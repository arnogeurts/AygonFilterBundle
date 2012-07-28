<?php

namespace Aygon\FilterBundle\Filter;

/**
 * @author Arno Geurts 
 */
class FilterManager
{
    /**
     * Array with filters
     * @var array
     */
    private $filters = array();
    
    /**
     * Filter a specific value with a given filter
     * 
     * @param mixed $value
     * @param string|array $filterName
     * @return mixed
     */
    public function filter($value, $filterName)
    {
        if (is_array($filterName)) {
            foreach ($filterName as $fn) {
                $value = $this->filter($value, $fn);
            }
            return $value;
        } else {
            return $this->getFilter($filterName)->filter($value);
        }
    }
    
    
    /**
     * Get all filters
     * 
     * @return array 
     */
    public function getFilters()
    {
        return $this->filters;
    }
    
    /**
     * Get specific filter
     * 
     * @param string $filterName
     * @return FilterInterface
     * @throws \Exception 
     */
    public function getFilter($filterName)
    {
        if ( ! $this->hasFilter($filterName)) {
            throw new \Exception(sprintf('No filter with name %s is defined in the filter service', $filterName));
        }
                
        return $this->filters[$filterName];
    }
    
    /**
     * Whether a filter with a given name exists
     * 
     * @param string $filterName
     * @return boolean 
     */
    public function hasFilter($filterName)
    {
        return array_key_exists($filterName, $this->filters);
    }
    
    /**
     * Add a filter to the service
     * 
     * @param FilterInterface $filter 
     */
    public function addFilter(FilterInterface $filter)
    {
        if ($this->hasFilter($filter->getName())) {
            throw new \Exception(sprintf('A filter with name %s was already defined in the filter service', $filter->getName()));
        }
        
        $this->filters[$filter->getName()] = $filter;
    }
}
