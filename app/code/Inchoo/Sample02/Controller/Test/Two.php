<?php

namespace Inchoo\Sample02\Controller\Test;

class Two extends \Magento\Framework\App\Action\Action
{
    protected $dummy;

    protected $factory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Inchoo\Sample02\Model\DummyInterfaceFactory $dummy,
        \Inchoo\Sample02\Model\BFactory $factory
    ) {
        parent::__construct($context);
        $this->dummy = $dummy;
        $this->factory = $factory;
    }

    public function execute()
    {
        $objectB = $this->factory->create();
        $objectDummy = $this->dummy->create();
    }
}
