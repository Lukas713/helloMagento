<?php

namespace Inchoo\Sample\Controller\News;

use Magento\Framework\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;

class Action extends \Magento\Framework\App\Action\Action
{
    private $pageFactory;

    private $registry;

    public function __construct
    (
        Context $context,
        PageFactory $pageFactory,
        Registry $registry
    )
    {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
        $this->registry = $registry;
    }

    public function execute()
    {
        $resultPage = $this->pageFactory->create();
        if(!$this->getRequest()->getParam('submit')){
            $this->registry->register('news', null);
            return $resultPage;
        }
        $result = $this->getRequest()->getParams();
        $this->registry->register('news', $result);
        return $resultPage;
    }
}