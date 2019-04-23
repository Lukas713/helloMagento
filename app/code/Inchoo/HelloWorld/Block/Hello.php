<?php

namespace Inchoo\HelloWorld\Block;

class Hello extends \Magento\Framework\View\Element\Template
{
    /**
     * @return string
     */
    public function getHelloWorld()
    {
        return "Hello World Lukas!";
    }
}