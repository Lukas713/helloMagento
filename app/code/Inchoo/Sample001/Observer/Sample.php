<?php

namespace Inchoo\Sample001\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class Sample implements ObserverInterface
{
    public function execute(Observer $observer)
    {
        $event = $observer->getEvent();
        echo "Hello " . $event->getFirstname() . ', you date of birth is ' . $event->getDob();
    }
}