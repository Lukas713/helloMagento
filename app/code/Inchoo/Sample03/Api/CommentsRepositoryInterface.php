<?php

namespace Inchoo\Sample03\Api;

interface CommentsRepositoryInterface
{
    /**
     * @param \Inchoo\Sample03\Api\Data\CommentsInterface $comments
     * @return \Inchoo\Sample03\Api\Data\CommentsInterface
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     */
    public function save(Data\CommentsInterface $comments);

    /**
     * @param \Inchoo\Sample03\Api\Data\CommentsInterface $comment
     * @return boolean, true on success
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     */
    public function delete(\Inchoo\Sample03\Api\Data\CommentsInterface $comment);

    /**
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
}