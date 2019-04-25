<?php
namespace Inchoo\Sample03\Block;

use Magento\Framework\View\Element\Template;

class ListAction extends Template
{
    protected $collectionFactory;


    public function __construct(
        Template\Context $context,
        \Inchoo\Sample03\Model\ResourceModel\News\CollectionFactory $collectionFactory,

        array $data = [])
    {
        parent::__construct($context, $data);
        $this->collectionFactory = $collectionFactory;

    }

    public function getProductCollection() {

        $collection = $this->collectionFactory->create();
        $collection->setOrder('news_id', 'DESC');
        $collection->setPageSize(10);

        return $collection;
    }
}