<?php

namespace Inchoo\Sample06\Controller\Adminhtml\News;

use Magento\Backend\App\Action;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\View\Page\Config;

class Index extends Action
{

    /**
     * @var Config
     */
    private $config;

    public function __construct
    (
        Action\Context $context,
        Config $config
    )
    {
        parent::__construct($context);
        $this->config = $config;
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

    /**
     * Index action
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $this->config->getTitle()->set(__("News"));
        $resultPage->setActiveMenu('Inchoo_Sample06::news');
        $resultPage->getConfig()->getTitle()->prepend(__('News'));
        return $resultPage;
    }

}
