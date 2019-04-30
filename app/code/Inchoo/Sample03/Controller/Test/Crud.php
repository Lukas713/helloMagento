<?php

namespace Inchoo\Sample03\Controller\Test;

use Magento\Framework\App\Action\Context;

class Crud  extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Inchoo\Sample03\Model\ResourceModel\News
     */
    protected $newsResource;

    /**
     * @var \Inchoo\Sample03\Model\NewsFactory
     */
    protected $newsModelFactory;

    protected $commentsFactory;

    protected $commentsResource;

    /**
     * Controller constructor.
     * @param Context $context
     * @param \Inchoo\Sample03\Model\ResourceModel\News $newsResource
     * @param \Inchoo\Sample03\Model\NewsFactory $newsModelFactory
     */
    public function __construct(
        Context $context,
        \Inchoo\Sample03\Model\ResourceModel\News $newsResource,
        \Inchoo\Sample03\Model\NewsFactory $newsModelFactory,
        \Inchoo\Sample03\Model\ResourceModel\Comments $commentsResource,
        \Inchoo\Sample03\Model\CommentsFactory $commentsFactory

    ) {
        parent::__construct($context);
        $this->newsResource = $newsResource;
        $this->newsModelFactory = $newsModelFactory;
        $this->commentsResource = $commentsResource;
        $this->commentsFactory = $commentsFactory;
    }

    /**
     * Controller action.
     */
    public function execute()
    {

        $comments = $this->commentsFactory->create();
        $comments->setCommentsContent("text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release");
        $comments->setInchooNews(1);
        $this->commentsResource->save($comments);

        $comments->setCommentsContent("text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release");
        $comments->setInchooNews(3);
        $this->commentsResource->save($comments);


        $comments->setCommentsContent("text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release");
        $comments->setInchooNews(3);
        $this->commentsResource->save($comments);


        $comments->setCommentsContent("text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release");
        $comments->setInchooNews(2);
        $this->commentsResource->save($comments);

        $comments->setCommentsContent("text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release");
        $comments->setInchooNews(1);
        $this->commentsResource->save($comments);


        /**
         * New entry example
         */
/*
        $news = $this->newsModelFactory->create();
        $news->setTitle('Some fake news title');
        $news->setCreated_at('2019-04-25 11:00:10');
        $news->setContent("bla bla bla bla bla bla bla");
        $this->newsResource->save($news);

        //var_dump($news); //big dump, can crash browser without xdebug
        var_dump($news->debug());

*/
        /**
         * Load example
         */
/*
        $news = $this->newsModelFactory->create();
        $this->newsResource->load($news, 1);

        if($news->getId()) {
            //check if loaded
        }

*/
    }

}