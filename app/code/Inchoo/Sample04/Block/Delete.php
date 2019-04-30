<?php

namespace Inchoo\Sample04\Block;

use Magento\Framework\Registry;
use Magento\Framework\View\Element\Template;

class Delete extends Template
{
    protected $registry;

    public function __construct
    (
        Template\Context $context,
        Registry $registry,
        array $data = []
    )
    {
        parent::__construct($context, $data);
        $this->registry = $registry;
    }

    public function index(){
        $news = $this->registry->registry('news');
        return $news;
    }
}