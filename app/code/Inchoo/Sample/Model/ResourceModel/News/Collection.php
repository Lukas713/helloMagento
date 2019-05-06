<?php

namespace Inchoo\Sample\Model\ResourceModel\News;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    public function _construct()
    {
        $this->_init
        (
            \Inchoo\Sample\Model\News::class,
            \Inchoo\Sample\Model\ResourceModel\News::class
        );
    }
}