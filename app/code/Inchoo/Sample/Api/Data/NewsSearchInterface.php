<?php

namespace Inchoo\Sample\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface NewsSearchInterface extends SearchResultsInterface
{
    /**
     * Get news list.
     *
     * @return \Inchoo\Sample\Api\Data\NewsInterface[]
     */
    public function getItems();

    /**
     * Set news list.
     *
     * @param \Inchoo\Sample\Api\Data\NewsInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}