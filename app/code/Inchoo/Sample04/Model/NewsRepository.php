<?php

namespace Inchoo\Sample04\Model;

use Inchoo\Sample04\Api\Data\NewsInterface;
use Inchoo\Sample04\Api\NewsRepositoryInterface;
use Inchoo\Sample04\Api\Data\NewsSearchResultsInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;

class NewsRepository implements NewsRepositoryInterface
{
    /**
     * @var \Inchoo\Sample04\Api\Data\NewsInterfaceFactory
     */
    protected $newsModelFactory;

    /**
     * @var \Inchoo\Sample04\Model\ResourceModel\News
     */
    protected $newsResource;

    /**
     * @var \Inchoo\Sample04\Model\ResourceModel\News\CollectionFactory
     */
    protected $newsCollectionFactory;

    /**
     * @var \Inchoo\Sample04\Api\Data\NewsSearchResultsInterfaceFactory
     */
    protected $searchResultsFactory;

    /**
     * @var CollectionProcessorInterface
     */
    private $collectionProcessor;


    public function __construct(
        \Inchoo\Sample04\Api\Data\NewsInterfaceFactory $newsModelFactory,
        \Inchoo\Sample04\Model\ResourceModel\News $newsResource,
        \Inchoo\Sample04\Model\ResourceModel\News\CollectionFactory $newsCollectionFactory,
        \Inchoo\Sample04\Api\Data\NewsSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->newsModelFactory = $newsModelFactory;
        $this->newsResource = $newsResource;
        $this->newsCollectionFactory = $newsCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @param int $newsId
     * @return NewsInterface
     * @throws NoSuchEntityException
     */
    public function getById($newsId)
    {
        $news = $this->newsModelFactory->create();
        $this->newsResource->load($news, $newsId);
        if (!$news->getId()) {
            throw new NoSuchEntityException(__('News with id "%1" does not exist.', $newsId));
        }
        return $news;
    }

    /**
     * @param NewsInterface $news
     * @return NewsInterface
     * @throws CouldNotSaveException
     */
    public function save(NewsInterface $news)
    {
        try {
            $this->newsResource->save($news);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }
        return $news;
    }

    /**
     * @param NewsInterface $news
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(NewsInterface $news)
    {
        try {
            $this->newsResource->delete($news);
            return true;
        } catch (\Exception $exception){
            throw new CouldNotDeleteException(__($exception->getMessage()));
        }
    }

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return NewsSearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        /** @var \Inchoo\Sample04\Model\ResourceModel\News\Collection $collection */
        $collection = $this->newsCollectionFactory->create();

        $this->collectionProcessor->process($searchCriteria, $collection);

        /** @var NewsSearchResultsInterface $searchResults */
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }


    /**
     * Adds record
     *
     * @param array $array
     * @throws CouldNotSaveException
     */
    public function addRecord($array = []){

        /**
         * @var \Inchoo\Sample04\Api\Data\NewsInterface $model
         */
        try {
            $model = $this->getById($array[NewsInterface::NEWS_ID]);
        }catch(NoSuchEntityException $exception){
            $model = $this->newsModelFactory->create();
            $exception->getMessage();
        }

        $model->setTitle($array[NewsInterface::CONTENT]);
        $model->setContent($array[NewsInterface::TITLE]);
        $this->save($model);
    }

    /**
     * Removes record from database
     *
     * @param int $id
     * @throws CouldNotDeleteException
     * @throws NoSuchEntityException
     */
    public function removeRecord($id)
    {
        try {
            $model = $this->getById($id);
        }catch (NoSuchEntityException $exception){
            throw $exception;
        }
        $this->delete($model);
    }
}