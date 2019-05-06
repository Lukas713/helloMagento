<?php

namespace Inchoo\Sample\Block;

use Inchoo\Sample\Model\NewsRepository;
use Magento\Framework\Api\FilterBuilder;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Registry;
use Magento\Framework\View\Element\Template;

class Insert extends Template
{
    private $registry;

    private $newsRepository;

    private $newsInterfaceFactory;

    private $searchCriteriaBuilder;

    private $filterBuilder;

    public function __construct
    (
        Template\Context $context,
        Registry $registry,
        NewsRepository $newsRepository,
        \Inchoo\Sample\Api\Data\NewsInterfaceFactory $newsInterfaceFactory,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        FilterBuilder $filterBuilder,
        array $data = []
    )
    {
        parent::__construct($context, $data);
        $this->registry = $registry;
        $this->newsRepository = $newsRepository;
        $this->newsInterfaceFactory = $newsInterfaceFactory;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->filterBuilder = $filterBuilder;
    }

    public function getFormAction()
    {
        $value = $this->registry->registry("news");
        if(!$value){
            return false;
        }else {
            return '/sample/news/action';
        }
    }
}