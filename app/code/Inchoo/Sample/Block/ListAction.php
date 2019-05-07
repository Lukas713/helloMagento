<?php

namespace Inchoo\Sample\Block;

use Inchoo\Sample\Api\Data\NewsInterfaceFactory;
use Inchoo\Sample\Api\NewsRepositoryInterface;
use Magento\Framework\Api\FilterBuilder;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\View\Element\Template;

class ListAction extends Template
{
    protected $newsRepository;

    protected $newsFactory;

    protected $filterBuilder;
    /**
     * @var SearchCriteriaBuilder
     */
    private $searchCriteriaBuilder;


    /**
     * ListAction constructor.
     * @param Template\Context $context
     * @param NewsRepositoryInterface $newsRepository
     * @param NewsInterfaceFactory $newsInterfaceFactory
     * @param FilterBuilder $filterBuilder
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     */
    public function __construct
    (
        Template\Context $context,
        NewsRepositoryInterface $newsRepository,
        NewsInterfaceFactory $newsInterfaceFactory,
        FilterBuilder $filterBuilder,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        array $data = []
    )
    {
        parent::__construct($context, $data);
        $this->newsRepository = $newsRepository;
        $this->newsFactory = $newsInterfaceFactory;
        $this->filterBuilder = $filterBuilder;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
    }

    public function display()
    {

        $this->searchCriteriaBuilder->setPageSize(3);
        $this->searchCriteriaBuilder->setCurrentPage(2);
        $searchCriteria = $this->searchCriteriaBuilder->create();

        $list = $this->newsRepository->getList($searchCriteria);
        return $list;
    }

    public function displayPaggination()
    {
        $count = $this->newsRepository->getSize();
        $pages = ceil($count / 3);  //toliko brojeva u paginaciji

    }
}