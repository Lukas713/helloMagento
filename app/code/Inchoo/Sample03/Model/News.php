<?php

namespace Inchoo\Sample03\Model;

class News extends \Magento\Framework\Model\AbstractModel
{
    /**
     * Initialize news Model
     * Defines resource model
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\Inchoo\Sample03\Model\ResourceModel\News::class);
    }

}