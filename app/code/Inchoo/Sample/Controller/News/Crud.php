<?php

namespace Inchoo\Sample\Controller\News;

use Inchoo\Sample\Api\Data\NewsInterfaceFactory;
use Inchoo\Sample\Api\NewsRepositoryInterface;
use Magento\Framework\App\Action\Context;

class Crud extends \Magento\Framework\App\Action\Action
{
    protected $newsFactory;

    protected $newsRepository;

    public function __construct
    (
        Context $context,
        NewsInterfaceFactory $newsFactory,
        NewsRepositoryInterface $newsRepository
    )
    {
        parent::__construct($context);
        $this->newsFactory = $newsFactory;
        $this->newsRepository = $newsRepository;
    }

    public function execute()
    {
        for($i=0; $i<10; ++$i){
            $model = $this->newsFactory->create();
            $model->setTitle($this->generateRandomString());
            $model->setContent($this->generateRandomString(25));
            $this->newsRepository->save($model);
        }
    }

    protected function generateRandomString($lenght = 10){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLenght = strlen($characters);
        $randomstring = '';
        for($i=0; $i<$charactersLenght; ++$i){
            $randomstring .= $characters[rand(0, $charactersLenght - 1)];
        }
        return $randomstring;
    }
}