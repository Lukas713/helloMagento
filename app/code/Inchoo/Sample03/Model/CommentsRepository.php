<?php

namespace Inchoo\Sample03\Model;

use Magento\Framework\Api\SearchCriteria\CollectionProcessor;
use Magento\Framework\Exception\CouldNotSaveException;
use Inchoo\Sample03\Api\Data\CommentsInterface;
use PhpMyAdmin\Di\NotFoundException;

class CommentsRepository implements \Inchoo\Sample03\Api\CommentsRepositoryInterface
{
    /**
     * @var \Inchoo\Sample03\Model\ResourceModel\Comments\CollectionFactory
     */
    private $collectionFactory;

    /**
     * @var \Inchoo\Sample03\Model\ResourceModel\Comments
     */
    private $commentResource;

    /**
     * @var \Inchoo\Sample03\Model\CommentsFactory
     */
    private $commentsFactory;

    /**
     * @var \Inchoo\Sample03\Api\Data\CommentsSearchResultsInterfaceFactory
     */
    private $searchResultsInterfaceFactory;

    private $collectionProcessor;

    public function __construct
    (
        \Inchoo\Sample03\Model\ResourceModel\Comments\CollectionFactory $collectionFactory,
        \Inchoo\Sample03\Model\ResourceModel\Comments $commentResource,
        \Inchoo\Sample03\Model\CommentsFactory $commentsFactory,
        \Inchoo\Sample03\Api\Data\CommentsSearchResultsInterfaceFactory $searchResultsInterfaceFactory,
        CollectionProcessor $collectionProcessor

    )
    {
        $this->collectionFactory = $collectionFactory;
        $this->commentResource = $commentResource;
        $this->commentsFactory = $commentsFactory;
        $this->searchResultsInterfaceFactory = $searchResultsInterfaceFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * Save DTO in database
     *
     * @param \Inchoo\Sample03\Api\Data\CommentsInterface $comments
     * @return \Inchoo\Sample03\Api\Data\CommentsInterface
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     */
    public function save(CommentsInterface $comment)
    {
        try {
            $this->commentResource->save($comment);
        }catch (\Exception $exception){
            throw new CouldNotSaveException(__($exception->getMessage()));
        }
        return $comment;
    }

    /**
     * Deletes DTO from database
     *
     * @param \Inchoo\Sample03\Api\Data\CommentsInterface $comment
     * @return boolean, true on success
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     */
    public function delete(\Inchoo\Sample03\Api\Data\CommentsInterface $comment)
    {
        try {
            $this->commentResource->delete($comment);
        }catch (\Exception $exception){
            throw new CouldNotSaveException(__($exception->getMessage()));
        }
        return true;
    }

    /**
     * Returns model object with id
     *
     * @param int, $id
     * @return \Inchoo\Sample03\Api\Data\CommentsInterface
     * @throws \PhpMyAdmin\Di\NotFoundException
     */
    public function getById($id)
    {
        $model = $this->commentsFactory->create();
        $this->commentResource->load($model, $id);
        if(!$model->getById()){
            throw new NotFoundException(__("There is no souch entitiy with id: " . $id));
        }
        return $model;
    }

    /**
     * Use filters on rows and return rows
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Inchoo\Sample03\Api\Data\CommentsSearchResultsInterface
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria)
    {
        /** @var \Inchoo\Sample03\Model\ResourceModel\Comments\Collection */
        $collection = $this->collectionFactory->create();

        //apply Search Criteria to Collection
        $this->collectionProcessor->process($searchCriteria, $collection);

        /** @var \Magento\Framework\Api\Search\SearchResult */
        $searchResult = $this->searchResultsInterfaceFactory->create();
        $searchResult->setSearchCriteria($searchCriteria);
        $searchResult->setItems($collection->getItems());
        $searchResult->setTotalCount($collection->getSize());
        return $searchResult;
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
}