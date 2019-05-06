<?php

namespace Inchoo\Sample\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface CommentsSearchInterface extends SearchResultsInterface
{
    /**
     * Get news list.
     *
     * @return \Inchoo\Sample\Api\Data\CommentsInterface[]
     */
    public function getItems();

    /**
     * Set news list.
     *
     * @param \Inchoo\Sample\Api\Data\CommentsInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}