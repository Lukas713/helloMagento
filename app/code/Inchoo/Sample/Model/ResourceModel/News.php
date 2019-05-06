<?php

namespace Inchoo\Sample\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class News extends AbstractDb
{
    public function _construct()
    {
        $this->_init("sample_news", "id");
    }
}