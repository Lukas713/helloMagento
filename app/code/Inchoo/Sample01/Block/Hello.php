<?php

namespace Inchoo\Sample01\Block;

use Magento\Framework\View\Element\Template;

class Hello extends \Magento\Framework\View\Element\Template
{
    public function __construct(
        Template\Context $context,
        array $data = [],
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    )
    {
        $this->_scopeConfig = $scopeConfig;
        parent::__construct($context, $data);
    }

    /**
     * @return string
     */
    public function getHelloWorld()
    {
        if($this->_scopeConfig->getValue("helloworld/general/enable")){
            return 'Hello World :]';
        }
        return "Nema!";
    }
}