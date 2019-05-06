<?php

namespace Inchoo\Sample001\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Psr\Log\LoggerInterface;

class Customerlogin implements ObserverInterface
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function execute(Observer $observer)
    {
        $client = $observer->getEvent()->getCustomer();
        $this->logger->info($client->getEmail() . ' has logged in');
    }
}