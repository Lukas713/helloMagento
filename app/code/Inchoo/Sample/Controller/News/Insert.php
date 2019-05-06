<?php

namespace Inchoo\Sample\Controller\News;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;

class Insert extends Action
{
    private $pageFactory;

    private $scopeConfig;

    private $registry;

    public function __construct
    (
        Context $context,
        PageFactory $pageFactory,
        ScopeConfigInterface $scopeConfig,
        Registry $registry
    )
    {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
        $this->scopeConfig = $scopeConfig;
        $this->registry = $registry;
    }

    public function execute()
    {
        $this->example = 2;
        $value = $this->scopeConfig->getValue("newsConfiguration/general/enable");
        $this->registry->register("news", $value);
        $resultPage = $this->pageFactory->create();
        return $resultPage;
    }
}