<?php

namespace Inchoo\Sample\Model;

use Inchoo\Sample\Api\Data\NewsInterface;
use Magento\Framework\Model\AbstractModel;

class News extends AbstractModel implements NewsInterface
{
    public function _construct()
    {
        $this->_init(\Inchoo\Sample\Model\ResourceModel\News::class);
    }

    public function setTitle($title)
    {
        return $this->setData(self::NEWS_TITLE, $title);
    }

    public function setContent($content)
    {
        return $this->setData(self::NEWS_CONTENT, $content);
    }

    public function getContent()
    {
        return $this->getData(self::NEWS_CONTENT);
    }

    public function getId()
    {
        return $this->getData(self::NEWS_ID);
    }

    public function getTitle()
    {
        return $this->getData(self::NEWS_TITLE);
    }
}