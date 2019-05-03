<?php


namespace Inchoo\Sample03\Controller\News;


class View extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;

    protected $collectionFactory;

    protected $registry;

    protected $newsFactory;

    protected $resourceModel;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Inchoo\Sample03\Model\ResourceModel\News\CollectionFactory $collectionFactory,
        \Inchoo\Sample03\Model\NewsFactory $newsFactory,
        \Inchoo\Sample03\Model\ResourceModel\News $resourceModel,
        \Magento\Framework\Registry $registry
    )
    {
        parent::__construct($context);
        $this->_pageFactory = $pageFactory;
        $this->registry = $registry;
        $this->collectionFactory = $collectionFactory;
        $this->newsFactory = $newsFactory;
        $this->resourceModel = $resourceModel;
    }


    public function execute() {

        $resultPage = $this->_pageFactory->create();
        $id = $this->getRequest()->getParam("id");

        $newsModel = $this->newsFactory->create();
        $this->resourceModel->load($newsModel, $id);

        if(empty($newsModel->getOrigData())){
            $this->registry->register("user", null);

        }else {
           $this->registry->register("user", $newsModel);
        }
        return $resultPage;
    }
}