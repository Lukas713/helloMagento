<?php

namespace Inchoo\Sample\Api;

interface CommentsRepositoryInterface
{
    /**
     * @param \Inchoo\Sample\Api\Data\CommentsInterface $comments
     * @return \Inchoo\Sample\Api\Data\CommentsInterface
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     */

    public function save(\Inchoo\Sample\Api\Data\CommentsInterface $comment);


    /**
     * @param \Inchoo\Sample\Api\Data\CommentsInterface $comment
     * @return boolean, true on success
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     */
    public function delete(\Inchoo\Sample\Api\Data\CommentsInterface $comment);


    /**
     * @param int $commentId
     * @return bool true on success
     * @throws \Magento\OfflineShipping\Model\ResourceModel\Carrier\Tablerate\CSV\ColumnNotFoundException
     */
    public function deleteById($commentId);


    /* @param int, $id
     * @return \Inchoo\Sample\Api\Data\CommentsInterface
     * @throws \PhpMyAdmin\Di\NotFoundException
     */
    public function getById($id);

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Inchoo\Sample\Api\Data\CommentsSearchInterface
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

}