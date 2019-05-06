<?php

namespace Inchoo\Sample03\Api;

interface CommentsRepositoryInterface
{
    /**
     * @param \Inchoo\Sample03\Api\Data\CommentsInterface $comments
     * @return \Inchoo\Sample03\Api\Data\CommentsInterface
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     */
<<<<<<< HEAD
    public function save(Data\CommentsInterface $comment);

    /**
     * @param \Inchoo\Sample03\Api\Data\CommentsInterface $comment
     * @return bool true on success
     * @throws \Magento\Framework\Exception\CouldNotDeleteException
=======
    public function save(Data\CommentsInterface $comments);

    /**
     * @param \Inchoo\Sample03\Api\Data\CommentsInterface $comment
     * @return boolean, true on success
     * @throws \Magento\Framework\Exception\CouldNotSaveException
>>>>>>> 8e12c73e0762bf44d2618a0790d7b89d12f62480
     */
    public function delete(\Inchoo\Sample03\Api\Data\CommentsInterface $comment);

    /**
<<<<<<< HEAD
     * @param int
     * @return \Inchoo\Sample03\Api\Data\CommentsInterface
     * @throws \Magento\OfflineShipping\Model\ResourceModel\Carrier\Tablerate\CSV\ColumnNotFoundException
     */
    public function getById($commentId);

    /**
     * @param int $commentId
     * @return bool true on success
     * @throws \Magento\OfflineShipping\Model\ResourceModel\Carrier\Tablerate\CSV\ColumnNotFoundException
     */
    public function deleteById($commentId);

    public function getList();
=======
     * @param int, $id
     * @return \Inchoo\Sample03\Api\Data\CommentsInterface
     * @throws \PhpMyAdmin\Di\NotFoundException
     */
    public function getById($id);

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Inchoo\Sample03\Api\Data\CommentsSearchResultsInterface
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    /**
     * @param int, $id
     * @return bool, true on success
     * @throws \PhpMyAdmin\Di\NotFoundException
     */
    public function deleteById($id);
>>>>>>> 8e12c73e0762bf44d2618a0790d7b89d12f62480
}