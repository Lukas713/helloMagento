<?php

namespace Inchoo\Sample06\Controller\Adminhtml\News;

use Inchoo\Sample04\Api\Data\NewsInterface;
use Magento\Backend\App\Action;
use Magento\Framework\Escaper;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Message\Manager;
use Magento\Framework\View\Result\PageFactory;

class Insert extends Action
{

    protected $manager;

    protected $pageFactory;


    /**
     * @var \Inchoo\Sample04\Api\NewsRepositoryInterface
     */
    protected $newsRepository;

    /**
     * @var \Inchoo\Sample04\Api\Data\NewsInterfaceFactory
     */
    protected $newsModelFactory;
    /**
     * @var Escaper
     */
    private $escaper;

    public function __construct
    (
        Action\Context $context,
        Manager $manager,
        PageFactory $pageFactory,
        \Inchoo\Sample04\Api\NewsRepositoryInterface $newsRepository,
        \Inchoo\Sample04\Api\Data\NewsInterfaceFactory $newsModelFactory,
        Escaper $escaper
    )
    {
        parent::__construct($context);
        $this->manager = $manager;
        $this->pageFactory = $pageFactory;
        $this->newsRepository = $newsRepository;
        $this->newsModelFactory = $newsModelFactory;
        $this->escaper = $escaper;
    }

    public function execute()
    {
        $params = $this->getRequest()->getParams();
        foreach($params as $key => $value){
            $params[$key] = $this->escaper->escapeHtml($value);
        }
        if($params[NewsInterface::TITLE] !== ''){
            try {
                $this->newsRepository->addRecord($params);
            }catch (CouldNotSaveException $exception){
                var_dump($exception->getMessage());
            }
            return $this->_redirect("sample06/news/new");
        }
        $this->manager->addNoticeMessage("Please fill all fields.");
        return $this->_redirect("sample06/news/new");
    }
}