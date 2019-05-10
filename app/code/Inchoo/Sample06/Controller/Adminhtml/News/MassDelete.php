<?php

namespace Inchoo\Sample06\Controller\Adminhtml\News;

use Inchoo\Sample04\Api\NewsRepositoryInterface;
use Magento\Backend\App\Action;

class MassDelete extends Action
{
    /**
     * @var NewsRepositoryInterface
     */
    private $newsRepository;

    public function __construct
    (
        Action\Context $context,
        NewsRepositoryInterface $newsRepository
    )
    {
        parent::__construct($context);
        $this->newsRepository = $newsRepository;
    }

    public function execute()
    {
        $result = $this->getRequest()->getParam('selected');
        foreach($result as $item){
            $this->newsRepository->removeRecord($item);
        }
    }
}