<?php

namespace Inchoo\Sample001\Controller;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Event\Manager;

class Index extends Action
{
    private $manager;

    public function __construct
    (
        Context $context,
        Manager $manager
    )
    {
        parent::__construct($context);
        $this->manager = $manager;
    }

    public function execute()
    {
        $this->manager->dispatch('sample_index_observer', ["firstname" => "lukas", "dob" => "27.06.1996"]);
    }
}