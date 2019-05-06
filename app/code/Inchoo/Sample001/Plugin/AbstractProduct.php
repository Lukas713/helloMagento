<?php

namespace Inchoo\Sample001\Plugin;

class AbstractProduct
{
    public function beforeGetAddToCartUrl
    (
        \Magento\Catalog\Block\Product\AbstractProduct $subject,
        $product,
        $additional = []
    )
    {
        return null;
    }

    public function afterGetAddToCartUrl
    (
        \Magento\Catalog\Block\Product\AbstractProduct $subject,
        $result
    )
    {
        return $result;
    }
}