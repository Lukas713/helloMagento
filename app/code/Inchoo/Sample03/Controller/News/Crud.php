<?php

namespace Inchoo\Sample03\Controller\News;

class Crud extends \Magento\Framework\App\Action\Action
{
    protected $commentsRepository;

    protected $commentsInterfaceFactory;

    protected $commentsFactory;


    /**
     * Controller constructor.
     */
    public function __construct
    (
        \Magento\Framework\App\Action\Context $context,
        \Inchoo\Sample03\Api\Data\CommentsInterfaceFactory $commentsInterfaceFactory,
        \Inchoo\Sample03\Model\CommentsRepository $commentsRepository,
        \Inchoo\Sample03\Model\CommentsFactory $commentsFactory

    ) {
        parent::__construct($context);
        $this->commentsInterfaceFactory = $commentsInterfaceFactory;
        $this->commentsRepository = $commentsRepository;
        $this->commentsFactory = $commentsFactory;
    }


    /**
     * Controller action.
     */
    public function execute()
    {
        $model = $this->commentsFactory->create();
        $model->setCommentsContent("bla bla bla ");
        $model->setInchooNews(4);
        $this->commentsRepository->save($model);
    }

}