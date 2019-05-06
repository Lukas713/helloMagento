<?php

namespace Inchoo\Sample\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Comments extends AbstractDb
{
    public function _construct()
    {
        $this->_init("sample_comments", "comments_id");
    }
}