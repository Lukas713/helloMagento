<?php


namespace Inchoo\Sample03\Api\Data;


use Magento\Framework\Api\SearchCriteriaInterface;

interface CommentsSearchResultsInterface extends SearchCriteriaInterface
{
    /**
     * Returns comment list
     *
     * @return \Inchoo\Sample03\Api\Data\CommentsInterface[]
     */
    public function getItems();

    /**
     * Inserts comment list
     *
     * @param \Inchoo\Sample03\Api\Data\CommentsInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}