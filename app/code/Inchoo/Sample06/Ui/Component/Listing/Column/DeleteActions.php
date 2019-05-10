<?php

namespace Inchoo\Sample06\Ui\Component\Listing\Column;

use Magento\Ui\Component\Listing\Columns\Column;

class DeleteActions extends Column
{
    public function prepareDataSource(array $dataSource)
    {
        if (!isset($dataSource['data']['items'])) {
            return $dataSource;
        }

        foreach ($dataSource['data']['items'] as & $item) {
            if (isset($item['news_id'])) {
                $item[$this->getData('name')] = [
                    'delete' => [
                        'href' => $this->context->getUrl(
                            'sample06/news/delete',
                            ['news_id' => $item['news_id']]
                        ),
                        'label' => __('Delete')
                    ]
                ];
            }
        }

        return $dataSource;
    }
}