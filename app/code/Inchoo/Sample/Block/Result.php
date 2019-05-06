<?php


namespace Inchoo\Sample\Block;


use Inchoo\Sample\Api\Data\NewsInterfaceFactory;
use Inchoo\Sample\Model\NewsRepository;
use Magento\Framework\Escaper;
use Magento\Framework\Registry;
use Magento\Framework\View\Element\Template;

class Result extends Template
{
    private $registry;

    private $newsRepository;

    private $newsInterfaceFactory;

    private $escaper;

    public function __construct
    (
        Template\Context $context,
        Registry $registry,
        NewsRepository $newsRepository,
        NewsInterfaceFactory $newsInterfaceFactory,
        Escaper $escaper,
        array $data = []
    )
    {
        parent::__construct($context, $data);
        $this->registry = $registry;
        $this->newsRepository = $newsRepository;
        $this->newsInterfaceFactory = $newsInterfaceFactory;
        $this->escaper = $escaper;
    }

    public function renderMessage(){
        $result = $this->registry->registry("news");
        if(!$result){
            return "<h3>Not allowed</h3>";
        }
        $model = $this->newsInterfaceFactory->create();
        $model->setTitle($this->escaper->escapeHtml($result['title']));
        $model->setContent($this->escaper->escapeHtml($result['content']));
        $this->newsRepository->save($model);
        return $model;
    }
}