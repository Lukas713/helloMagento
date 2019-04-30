<?php


namespace Inchoo\Sample03\Model\ResourceModel\Comments;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            \Inchoo\Sample03\Model\Comments::class,
            \Inchoo\Sample03\Model\ResourceModel\Comments::class
        );
    }
}