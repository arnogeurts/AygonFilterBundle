<?php

namespace Aygon\FilterBundle\Form\EventListener;

use Aygon\FilterBundle\Filter\FilterManager;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\Event\FilterDataEvent;

/**
 * @author Arno Geurts
 */
class FilterListener implements EventSubscriberInterface
{
    /**
     * The filters to apply
     * @var array
     */
    private $filters;
    
    /**
     * The filter manager
     * @var FilterManager 
     */
    private $filter;
    
    /**
     * Constructor
     * @param array $filters 
     */
    public function __construct(FilterManager $filter, array $filters)
    {
        $this->filter = $filter;
        $this->filters = $filters;
    }
    
    /**
     * Apply filters
     * 
     * @param FilterDataEvent $event 
     */
    public function onBindClientData(FilterDataEvent $event)
    {
        // only bottom layer fields return a string
        if ( ! is_string($event->getData()) || strlen($event->getData()) < 1) {
            return;
        }
        
        $data = $event->getData();
        $filtered = $this->filter->filter($data, $this->filters);
        $event->setData($filtered);
    }

    /**
     * Subscribe to bind client data event of a field type
     * 
     * @return array
     */
    static public function getSubscribedEvents()
    {
        return array(FormEvents::BIND_CLIENT_DATA => 'onBindClientData');
    }
}
