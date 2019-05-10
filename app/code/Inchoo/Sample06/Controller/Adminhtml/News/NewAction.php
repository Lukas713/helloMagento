<?php

namespace Inchoo\Sample06\Controller\Adminhtml\News;

use Magento\Backend\App\Action;
use Magento\Framework\View\Result\PageFactory;

class NewAction extends Action
{
    protected $pageFactory;

    public function __construct
    (
        Action\Context $context,
        PageFactory $pageFactory
    )
    {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
    }

    /**
     * Check the permission to run it
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Inchoo_Sample06::news');
    }

    public function execute()
    {
        $resultPage = $this->pageFactory->create();
        return $resultPage;
    }
}