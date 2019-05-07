<?php

namespace Inchoo\Sample\Api;

interface NewsRepositoryInterface
{
    /**
     * @param \Inchoo\Sample\Api\Data\NewsInterface $comments
     * @return \Inchoo\Sample\Api\Data\NewsInterface
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     */

    public function save(Data\NewsInterface $comment);


    /**
     * @param \Inchoo\Sample\Api\Data\NewsInterface $comment
     * @return boolean, true on success
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     */
    public function delete(\Inchoo\Sample\Api\Data\NewsInterface $comment);


    /**
     * @param int $commentId
     * @return bool true on success
     * @throws \Magento\OfflineShipping\Model\ResourceModel\Carrier\Tablerate\CSV\ColumnNotFoundException
     */
    public function deleteById($commentId);


    /* @param int, $id
     * @return \Inchoo\Sample\Api\Data\NewsInterface
     * @throws \PhpMyAdmin\Di\NotFoundException
     */
    public function getById($id);

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Inchoo\Sample\Api\Data\CommentsSearchInterface
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    /**
     * @return int
     */
    public function getSize();

}