<?php


namespace Inchoo\Sample03\Model\ResourceModel;


use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Comments extends AbstractDb
{
    protected function _construct(){
        $this->_init("inchoo_news_comments", "comment_id");
    }
}