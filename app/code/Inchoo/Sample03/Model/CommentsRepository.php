<?php


namespace Inchoo\Sample03\Model;


use Magento\Framework\Exception\CouldNotSaveException;

class CommentsRepository implements \Inchoo\Sample03\Api\CommentsRepositoryInterface
{
    /**
     * @var ResourceModel\Comments\CollectionFactory
     */
    private $collectionFactory;

    /**
     * @var ResourceModel\Comments
     */
    private $commentsRecourse;

    /**
     * @var CommentsFactory
     */
    private $commentsFactory;

    public function __construct
    (
        \Inchoo\Sample03\Model\ResourceModel\Comments\CollectionFactory $collectionFactory,
        \Inchoo\Sample03\Model\ResourceModel\Comments $commentsResource,
        \Inchoo\Sample03\Model\CommentsFactory $commentsFactory
    )
    {
        $this->collectionFactory = $collectionFactory;
        $this->commentsRecourse = $commentsResource;
        $this->commentsFactory = $commentsFactory;
    }

    public function save(\Inchoo\Sample03\Api\Data\CommentsInterface $comment)
    {
        try {
            $this->commentsRecourse->save($comment);
        }catch (\Exception $exception){
            throw new CouldNotSaveException(__($exception->getMessage()));
        }
        return $comment;
    }

    public function delete(\Inchoo\Sample03\Api\Data\CommentsInterface $comment)
    {
        try {
            $this->commentsRecourse->delete($comment);
        }catch (\Exception $exception){
            throw new CouldNotSaveException(__($exception->getMessage()));
        }
        return true;
    }

    public function getById()
    {
        // TODO: Implement getById() method.
    }

    public function getList()
    {
        // TODO: Implement getList() method.
    }

    public function deleteById()
    {
        // TODO: Implement deleteById() method.
    }
}