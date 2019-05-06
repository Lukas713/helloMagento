<?php

namespace Inchoo\Sample\Model;

use Inchoo\Sample\Api\Data;
use Inchoo\Sample\Api\NewsRepositoryInterface;
use Inchoo\Sample\Model\ResourceModel\News\Collection;
use Magento\Framework\Api\SearchCriteria\CollectionProcessor;
use Magento\Framework\Data\CollectionFactory;
use Magento\Framework\Exception\CouldNotSaveException;

class NewsRepository implements NewsRepositoryInterface
{
    /**
     * @var \Inchoo\Sample\Api\Data\NewsInterfaceFactory $newsInterfaceFactory
     */
    private $newsInterfaceFactory;

    /**
     * @var \Inchoo\Sample\Api\Data\NewsSearchInterfaceFactory $newsSearchInterfaceFactory
     */
    private $newsSearchInterfaceFactory;

    /**
     * @var \Inchoo\Sample\Model\ResourceModel\News\CollectionFactory $collectionFactory
     */
    private $collectionFactory;

    /**
     * @var \Inchoo\Sample\Model\ResourceModel\News $newsResource
     */
    private $newsResource;

    /**
     * @var \Magento\Framework\Api\SearchCriteria\CollectionProcessor
     */
    private $collectionProcessor;

    public function __construct
    (
        Data\NewsInterfaceFactory $newsInterfaceFactory,
        Data\NewsSearchInterfaceFactory $newsSearchInterfaceFactory,
        \Inchoo\Sample\Model\ResourceModel\News\CollectionFactory $collectionFactory,
        \Inchoo\Sample\Model\ResourceModel\News $newsResource,
        CollectionProcessor $collectionProcessor
    )
    {
        $this->newsInterfaceFactory = $newsInterfaceFactory;
        $this->newsSearchInterfaceFactory = $newsSearchInterfaceFactory;
        $this->collectionFactory = $collectionFactory;
        $this->newsResource = $newsResource;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * Returns model object with id
     *
     * @param int, $id
     * @return \Inchoo\Sample\Api\Data\NewsInterface
     * @throws \PhpMyAdmin\Di\NotFoundException
     */
    public function getById($id)
    {
        $model = $this->newsInterfaceFactory->create();
        $this->newsResource->load($model, $id);
        if(!$model->getById()){
            throw new NotFoundException(__("There is no souch entitiy with id: " . $id));
        }
        return $model;
    }

    /**
     * Use filters on rows and return rows
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Inchoo\Sample\Api\Data\NewsSearchInterface
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->collectionFactory->create();

        $this->collectionProcessor->process($searchCriteria, $collection);

        /** @var \Magento\Framework\Api\Search\SearchResult */
        $searchResult = $this->newsSearchInterfaceFactory->create();
        $searchResult->setSearchCriteria($searchCriteria);
        $searchResult->setItems($collection->getItems());
        $searchResult->setTotalCount($collection->getSize());

        return $searchResult;
    }

    /**
     * Save DTO in database
     *
     * @param \Inchoo\Sample\Api\Data\NewsInterface $comment
     * @return \Inchoo\Sample\Api\Data\NewsInterface
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     */
    public function save(Data\NewsInterface $comment)
    {
        try {
            $this->newsResource->save($comment);
        }catch (\Exception $exception){
            throw new CouldNotSaveException(__($exception->getMessage()));
        }
        return $comment;
    }

    /**
     * Deletes DTO from database
     *
     * @param \Inchoo\Sample\Api\Data\NewsInterface $comment
     * @return boolean, true on success
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     */
    public function delete(Data\NewsInterface $comment)
    {
        try {
            $this->newsResource->delete($comment);
        }catch (\Exception $exception){
            throw new CouldNotSaveException(__($exception->getMessage()));
        }
        return true;    }

    /**
     * Deletes model object with id
     *
     * @param int, $id
     * @return bool, true on success
     * @throws \PhpMyAdmin\Di\NotFoundException
     */
    public function deleteById($id)
    {
        $model = $this->getById($id);
        return $this->delete($model);
    }
}