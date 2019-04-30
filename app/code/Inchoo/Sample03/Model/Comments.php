<?php


namespace Inchoo\Sample03\Model;


use Magento\Framework\Model\AbstractModel;

class Comments extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(\Inchoo\Sample03\Model\ResourceModel\Comments::class);
    }
}