<?php

namespace Inchoo\Sample03\Controller\Test;

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
        \Inchoo\Sample03\Model\CommentsRepository $commentsRepository
    ) {
        parent::__construct($context);
        $this->commentsInterfaceFactory = $commentsInterfaceFactory;
        $this->commentsRepository = $commentsRepository;
    }


    /**
     * Controller action.
     */
    public function execute()
    {

        for($i=0; $i<20; ++$i){
            $model = $this->commentsInterfaceFactory->create();
            $model->setCommentsContent("bla asegsegbla bla");
            $model->setInchooNews(rand(8, 23));
            $this->commentsRepository->save($model);
        }
    }

}