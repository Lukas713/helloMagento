<?php

namespace Inchoo\Sample03\Model;

<<<<<<< HEAD
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Inchoo\Sample03\Api\Data\CommentsInterface;
use Magento\OfflineShipping\Model\ResourceModel\Carrier\Tablerate\CSV\ColumnNotFoundException;
=======
use Magento\Framework\Api\SearchCriteria\CollectionProcessor;
use Magento\Framework\Exception\CouldNotSaveException;
use Inchoo\Sample03\Api\Data\CommentsInterface;
use PhpMyAdmin\Di\NotFoundException;
>>>>>>> 8e12c73e0762bf44d2618a0790d7b89d12f62480

class CommentsRepository implements \Inchoo\Sample03\Api\CommentsRepositoryInterface
{

    /**
<<<<<<< HEAD
     * @var \Inchoo\Sample03\Model\ResourceModel\Comments\
=======
     * @var \Inchoo\Sample03\Model\ResourceModel\Comments\CollectionFactory
>>>>>>> 8e12c73e0762bf44d2618a0790d7b89d12f62480
     */

    private $collectionFactory;

    /**
<<<<<<< HEAD
     * @var  \Inchoo\Sample03\Model\ResourceModel\Comments
     */
    private $commentsResource;
=======
     * @var \Inchoo\Sample03\Model\ResourceModel\Comments
     */
    private $commentResource;
>>>>>>> 8e12c73e0762bf44d2618a0790d7b89d12f62480

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
<<<<<<< HEAD
        $this->commentsResource = $commentsResource;
=======
        $this->commentResource = $commentResource;
>>>>>>> 8e12c73e0762bf44d2618a0790d7b89d12f62480
        $this->commentsFactory = $commentsFactory;
        $this->searchResultsInterfaceFactory = $searchResultsInterfaceFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
<<<<<<< HEAD
     * Save Comment data
=======
     * Save DTO in database
>>>>>>> 8e12c73e0762bf44d2618a0790d7b89d12f62480
     *
     * @param \Inchoo\Sample03\Api\Data\CommentsInterface $comments
     * @return \Inchoo\Sample03\Api\Data\CommentsInterface
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     */
    public function save(CommentsInterface $comment)
    {
        try {
<<<<<<< HEAD
            $this->commentsResource->save($comment);
=======
            $this->commentResource->save($comment);
>>>>>>> 8e12c73e0762bf44d2618a0790d7b89d12f62480
        }catch (\Exception $exception){
            throw new CouldNotSaveException(__($exception->getMessage()));
        }
        return $comment;
    }

    /**
<<<<<<< HEAD
     * deletes comment
     *
     * @param \Inchoo\Sample03\Api\Data\CommentsInterface $comments
     * @return bool true on success
     * @throws CouldNotDeleteException
     */
    public function delete(CommentsInterface $comment)
    {
        try {
            $this->commentsResource->delete($comment);
=======
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
>>>>>>> 8e12c73e0762bf44d2618a0790d7b89d12f62480
        }catch (\Exception $exception){
            throw new CouldNotDeleteException(__($exception->getMessage()));
        }
        return true;
    }

    /**
<<<<<<< HEAD
     * loads comment with id
     *
     * @param int $Id
     * @return \Inchoo\Sample03\Api\Data\CommentsInterface
     * @throws ColumnNotFoundException
     */
    public function getById($Id)
    {
        try {
            $comment = $this->commentsFactory->create();
            $this->commentsResource->load($comment, $Id);
        }catch (\Exception $exception) {
            throw new ColumnNotFoundException(__($exception->getMessage()));
        }
        return $comment;
=======
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
>>>>>>> 8e12c73e0762bf44d2618a0790d7b89d12f62480
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

<<<<<<< HEAD
    /**
     * deletes comment with id
     *
     * @param int $commentId
     * @return bool true on success
     * @throws \Magento\OfflineShipping\Model\ResourceModel\Carrier\Tablerate\CSV\ColumnNotFoundException
     */
    public function deleteById($Id)
    {
        try {
            $comment = $this->commentsFactory->create();
            $this->commentsResource->delete($comment);
        }catch (\Exception $exception){
            throw new ColumnNotFoundException(__($exception->getMessage()));
        }
        return true;
=======

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
>>>>>>> 8e12c73e0762bf44d2618a0790d7b89d12f62480
    }
}