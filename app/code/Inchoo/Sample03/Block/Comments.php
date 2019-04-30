<?php

namespace Inchoo\Sample03\Block;

use Magento\Framework\View\Element\Template;

class Comments extends Template
{
    protected $collectionFactory;

    protected $commentsResource;

    protected $commentsFactory;

    public function __construct
    (
        Template\Context $context,
        \Inchoo\Sample03\Model\ResourceModel\Comments\CollectionFactory $collectionFactory,
        \Inchoo\Sample03\Model\ResourceModel\Comments $commentsResource,
        \Inchoo\Sample03\Model\CommentsFactory $commentsFactory,
        array $data = []
    )
    {
        parent::__construct($context, $data);
        $this->collectionFactory = $collectionFactory;
        $this->commentsResource = $commentsResource;
        $this->commentsFactory = $commentsFactory;
    }

    public function index()
    {
        /*
        $model = $this->commentsFactory->create();
        $this->commentsResource->load($model, 3);
        return $model;
        */
        $collection = $this->collectionFactory->create();

        $collection->addOrder("news_id"
        )->getSelect()->join('inchoo_news', 'main_table.inchoo_news = inchoo_news.news_id');

        return $collection;
    }
}