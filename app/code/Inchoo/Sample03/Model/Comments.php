<?php


namespace Inchoo\Sample03\Model;


use Inchoo\Sample04\Api\Data\CommentsInterface;
use Magento\Framework\Model\AbstractModel;

class Comments extends AbstractModel implements CommentsInterface
{
    protected function _construct()
    {
        $this->_init(\Inchoo\Sample03\Model\ResourceModel\Comments::class);
    }

    public function setCommentsContent($content)
    {
        return $this->setData(self::CONTENT, $content);
    }

    public function setInchooNews($news)
    {
        return $this->setData(self::NEWS, $news);
    }

    public function getId()
    {
        return $this->getData(self::ID);
    }

    public function getInchooNews()
    {
        return $this->getData(self::NEWS);
    }

    public function getCommentsContent()
    {
        return $this->getData(self::CONTENT);
    }
}