<?php


namespace Inchoo\Sample03\Block;


use Inchoo\Sample03\Api\Data\CommentsInterface;
use Inchoo\Sample03\Api\Data\CommentsInterfaceFactory;
use Inchoo\Sample03\Model\CommentsRepository;
use Magento\Framework\Api\FilterBuilder;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\View\Element\Template;

class Comments extends Template
{
    private $filterBuilder;

    private $searchCriteriaBuilder;

    private $commentsInterfaceFactory;

    private $commentsRepository;

    public function __construct
    (
        Template\Context $context,
        FilterBuilder $filterBuilder,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        CommentsInterfaceFactory $commentsInterfaceFactory,
        CommentsRepository $commentsRepository,
        array $data = []
    )
    {
        parent::__construct($context, $data);
        $this->filterBuilder = $filterBuilder;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->commentsInterfaceFactory = $commentsInterfaceFactory;
        $this->commentsRepository = $commentsRepository;
    }

    public function index() {

        $this->searchCriteriaBuilder->addFilter(CommentsInterface::ID, 15, 'gt');
        $searchCriteria = $this->searchCriteriaBuilder->create();

        $result = $this->commentsRepository->getList($searchCriteria)->getItems();
        return $result;
    }
}