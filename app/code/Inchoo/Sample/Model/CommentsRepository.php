<?php

namespace Inchoo\Sample\Model;

use Inchoo\Sample\Api\Data\CommentsInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessor;
use Magento\Framework\Data\CollectionFactory;

class CommentsRepository implements \Inchoo\Sample\Api\NewsRepositoryInterface
{
    /**
     * @var \Inchoo\Sample\Api\Data\CommentsInterfaceFactory $commentsInterfaceFactory
     */
    private $commentsInterfaceFactory;

    /**
     * @var \Inchoo\Sample\Model\ResourceModel\Comments $commentsResource
     */
    private $commentsResource;

    /**
     * @var \Inchoo\Sample\Model\ResourceModel\Comments\CollectionFactory $collectionFactory
     */
    private $collectionFactory;

    /**
     * @var CollectionProcessor
     */
    private $collectionProcessor;

    /**
     * @var \Inchoo\Sample\Api\Data\CommentsSearchInterfaceFactory $commentsSearchInterfaceFactory
     */
    private $commentsSearchInterfaceFactory;

    public function __construct
    (
        CommentsInterfaceFactory $commentsInterfaceFactory,
        ResourceModel\Comments $commentsResource,
        CollectionFactory $collectionFactory,
        CollectionProcessor $collectionProcessor,
        CommentsSearchInterfaceFactory $commentsSearchInterfaceFactory
    )
    {
        $this->commentsInterfaceFactory = $commentsInterfaceFactory;
        $this->commentsResource = $commentsResource;
        $this->collectionFactory = $collectionFactory;
        $this->collectionProcessor = $collectionProcessor;
        $this->commentsSearchInterfaceFactory = $commentsSearchInterfaceFactory;
    }

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

    /**
     * Returns model object with id
     *
     * @param int, $id
     * @return \Inchoo\Sample\Api\Data\CommentsInterface
     * @throws \PhpMyAdmin\Di\NotFoundException
     */
    public function getById($id)
    {
        $model = $this->commentsInterfaceFactory->create();
        $this->commentsResource->load($model, $id);
        if(!$model->getById()){
            throw new NotFoundException(__("There is no souch entitiy with id: " . $id));
        }
        return $model;
    }

    /**
     * Deletes DTO from database
     *
     * @param \Inchoo\Sample\Api\Data\CommentsInterface $comment
     * @return boolean, true on success
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     */
    public function delete(CommentsInterface $comment)
    {
        try {
            $this->commentsResource->delete($comment);
        }catch (\Exception $exception){
            throw new CouldNotSaveException(__($exception->getMessage()));
        }
        return true;
    }


    /**
     * Use filters on rows and return rows
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Inchoo\Sample\Api\Data\CommentsSearchInterface
     */

    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria)
    {
        /** @var \Inchoo\Sample\Model\ResourceModel\Comments\Collection */
        $collection = $this->collectionFactory->create();

        $this->collectionProcessor->process($searchCriteria, $collection);

        /** @var \Magento\Framework\Api\Search\SearchResult */
        $searchResult = $this->commentsSearchInterfaceFactory->create();
        $searchResult->setSearchCriteria($searchCriteria);
        $searchResult->setItems($collection->getItems());
        $searchResult->setTotalCount($collection->getSize());

        return $searchResult;
    }

    /**
     * Save DTO in database
     *
     * @param \Inchoo\Sample\Api\Data\CommentsInterface $comments
     * @return \Inchoo\Sample\Api\Data\CommentsInterface
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     */
    public function save(CommentsInterface $comment)
    {
        try {
            $this->commentsResource->save($comment);
        }catch (\Exception $exception){
            throw new CouldNotSaveException(__($exception->getMessage()));
        }
        return $comment;
    }
}