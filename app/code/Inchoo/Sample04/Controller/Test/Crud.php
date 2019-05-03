<?php

namespace Inchoo\Sample04\Controller\Test;

use Magento\Cms\Model\PageFactory;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Registry;

class Crud extends Action
{
    /**
     * @var \Inchoo\Sample04\Api\NewsRepositoryInterface
     */
    protected $newsRepository;

    /**
     * @var \Inchoo\Sample04\Api\Data\NewsInterfaceFactory
     */
    protected $newsModelFactory;

    protected $pageFactory;

    protected $registry;

    /**
     * Crud constructor.
     *
     * @param Context $context
     * @param \Inchoo\Sample04\Api\NewsRepositoryInterface $newsRepository
     * @param \Inchoo\Sample04\Api\Data\NewsInterfaceFactory $newsModelFactory
     */
    public function __construct(
        Context $context,
        \Inchoo\Sample04\Api\NewsRepositoryInterface $newsRepository,
        \Inchoo\Sample04\Api\Data\NewsInterfaceFactory $newsModelFactory,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        Registry $registry
    ) {
        parent::__construct($context);
        $this->newsRepository = $newsRepository;
        $this->newsModelFactory = $newsModelFactory;
        $this->pageFactory = $pageFactory;
        $this->registry = $registry;
    }

    /**
     * Controller action.
     */
    public function execute()
    {
        /**
         * Load through repository example
         */
        try{
            $id = $this->getRequest()->getParam("id");
            $news = $this->newsRepository->getById($id);
            if(!$this->newsRepository->delete($news)){
                $this->registry->register('news', null);
            }else {
                $this->registry->register('news', $news);
            }
        } catch (\Exception $exception){
            $this->registry->register('news', null);
        }
        return $this->pageFactory->create();




        /**
         * Save through repository example


        try {
            $news = $this->newsModelFactory->create();
            $news->setTitle('Dummy news title');

            $this->newsRepository->save($news);
            var_dump($news->debug());
        } catch (CouldNotSaveException $e) {
            //handle error
        }

         */
    }

}