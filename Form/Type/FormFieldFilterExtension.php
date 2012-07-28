<?php
namespace Aygon\FilterBundle\Form\Type;

use Aygon\FilterBundle\Filter\FilterManager;
use Aygon\FilterBundle\Form\EventListener\FilterListener;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Form Type Filter Extension
 *
 * Extends the Form Type and adds auto filtering to it.
 * It checks the dms_filter.auto_filter_forms parameter to see if it should or
 * not enable auto filtering.
 */
class FormFieldFilterExtension extends AbstractTypeExtension
{
    /**
     * @var FilterManager
     */
    protected $filter;

    /**
     * Constructor
     * @param FilterManager $filter
     */
    public function __construct(FilterManager $filter)
    {
        $this->filter = $filter;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $filters = is_array($options['filters']) ? $options['filters'] : array($options['filters']);
        $builder->addEventSubscriber(new FilterListener($this->filter, $filters));
    }
    
    /**
     * {@inheritdoc}
     */
    public function getDefaultOptions()
    {
        return array('filters' => array('strip_tags'));
    }
    
    /**
     * {@inheritdoc}
     */
    public function getExtendedType()
    {
        return 'field';
    }
}