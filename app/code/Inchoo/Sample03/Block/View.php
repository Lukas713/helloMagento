<?php


namespace Inchoo\Sample03\Block;

use Magento\Framework\View\Element\Template;

class View extends Template
{
    protected $registry;

    public function __construct(
        Template\Context $context,
        \Magento\Framework\Registry $registry,
        array $data = [])
    {
        parent::__construct($context, $data);
        $this->registry = $registry;
    }

    public function getNewsWithId() {
        $news = $this->registry->registry('user');
        if(!$news){
            return 0 ;
        }
        return $news;
    }
}