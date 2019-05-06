<?php

namespace Inchoo\Sample\Model\ResourceModel\Comments;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    public function _construct()
    {
        $this->_init
        (
            \Inchoo\Sample\Model\Comments::class,
            \Inchoo\Sample\Model\ResourceModel\Comments::class
        );
    }
}