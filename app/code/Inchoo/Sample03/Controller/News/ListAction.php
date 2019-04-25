<?php

namespace Inchoo\Sample03\Controller\News;

/**
 * Class ListAction
 * @package Inchoo\Sample03\Controller\Index
 *
 * List is reserved keyword in PHP, so we're using Action suffix in controller name !!
 */
class ListAction extends \Magento\Framework\App\Action\Action
{

    protected $_pageFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory
    )
    {
        $this->_pageFactory = $pageFactory;
        parent::__construct($context);
    }

    public function execute() {
        $resultPage = $this->_pageFactory->create();
        return $resultPage;
    }
}