<?php

namespace Inchoo\Sample03\Controller\Comments;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Komentar extends Action
{
    protected $pageFactory;

    protected $commentsFactory;

    public function __construct
    (
        Context $context,
        PageFactory $pageFactory
    )
    {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
    }

    public function execute()
    {
        return $this->pageFactory->create();
    }
}