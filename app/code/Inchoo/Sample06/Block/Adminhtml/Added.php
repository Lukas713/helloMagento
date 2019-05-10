<?php

namespace Inchoo\Sample06\Block\Adminhtml;

use Magento\Framework\Message\Manager;
use Magento\Framework\View\Element\Template;

class Added extends Template
{
    protected $manager;

    public function __construct
    (
        Template\Context $context,
        Manager $manager,
        array $data = []
    )
    {
        parent::__construct($context, $data);
        $this->manager = $manager;
    }

    public function getMessage() {
        if($this->manager->hasMessages()){
            return $this->manager->getMessages();
        }
    }
}