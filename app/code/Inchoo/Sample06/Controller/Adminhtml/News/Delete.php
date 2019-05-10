<?php

namespace Inchoo\Sample06\Controller\Adminhtml\News;

use Inchoo\Sample04\Api\Data\NewsInterface;
use Inchoo\Sample04\Api\NewsRepositoryInterface;
use Magento\Backend\App\Action;
use Magento\Framework\Message\Manager;
use Magento\Setup\Exception;

class Delete extends Action
{
    /**
     * @var \Inchoo\Sample04\Api\Data\NewsRepositoryInterface $newsRepository
     */
    private $newsRepository;
    /**
     * @var \Inchoo\Sample04\Api\Data\NewsInterfaceFactory $newsFactory
     */
    private $newsFactory;
    /**
     * @var Manager
     */
    private $manager;

    public function __construct
    (
        Action\Context $context,
        NewsRepositoryInterface $newsRepository,
        \Inchoo\Sample04\Api\Data\NewsInterfaceFactory $newsFactory,
        Manager $manager
    )
    {
        parent::__construct($context);
        $this->newsRepository = $newsRepository;
        $this->newsFactory = $newsFactory;
        $this->manager = $manager;
    }

    public function execute()
    {
        $id = $this->getRequest()->getParam(NewsInterface::NEWS_ID);
        if(!$id){
            $this->manager->addErrorMessage("Something went wrong, please try again");
            return $this->_redirect("sample06/news/index");
        }
        try{
            $this->newsRepository->removeRecord($id);
        }catch (\Exception $exception){
            $this->manager->addErrorMessage("Something went wrong, please try again");
            return $this->_redirect("sample06/news/index");
        }
        $this->manager->addNoticeMessage("Successfully deleted record");
        return $this->_redirect("sample06/news/index");
    }
}