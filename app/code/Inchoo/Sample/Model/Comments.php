<?php

namespace Inchoo\Sample\Model;

use Magento\Framework\Model\AbstractModel;

class Comments extends AbstractModel
{
    public function _construct()
    {
        $this->_init(\Inchoo\Sample\Model\ResourceModel\Comments::class);
    }
}