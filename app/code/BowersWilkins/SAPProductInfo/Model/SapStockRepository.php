<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace BowersWilkins\SAPProductInfo\Model;

use BowersWilkins\SAPProductInfo\Api\Data;
use BowersWilkins\SAPProductInfo\Api\SapStockRepositoryInterface;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Reflection\DataObjectProcessor;
use BowersWilkins\SAPProductInfo\Model\ResourceModel\SapStock as ResourceSapStock;
use BowersWilkins\SAPProductInfo\Model\ResourceModel\SapStock\CollectionFactory as SapStockCollectionFactory;
use Magento\Store\Model\StoreManagerInterface;

/**
 * Class SapStockRepository
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class SapStockRepository implements SapStockRepositoryInterface
{
    /**
     * @var ResourceSapStock
     */
    protected $resource;

    /**
     * @var SapStockFactory
     */
    protected $sapStockFactory;

    /**
     * @var SapStockCollectionFactory
     */
    protected $sapStockCollectionFactory;

    /**
     * @var Data\SapStockSearchResultsInterfaceFactory
     */
    protected $searchResultsFactory;

    /**
     * @var DataObjectHelper
     */
    protected $dataObjectHelper;

    /**
     * @var DataObjectProcessor
     */
    protected $dataObjectProcessor;

    /**
     * @var \BowersWilkins\SAPProductInfo\Api\Data\SapStockInterfaceFactory
     */
    protected $dataSapStockFactory;

    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    private $storeManager;


    /**
     * SapStockRepository constructor.
     * @param ResourceSapStock $resource
     * @param SapStockFactory $sapStockFactory
     * @param Data\SapStockInterfaceFactory $dataSapStockFactory
     * @param SapStockCollectionFactory $sapStockCollectionFactory
     * @param Data\SapStockSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(
        ResourceSapStock $resource,
        SapStockFactory $sapStockFactory,
        Data\SapStockInterfaceFactory $dataSapStockFactory,
        SapStockCollectionFactory $sapStockCollectionFactory,
        Data\SapStockSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager
    ) {
        $this->resource = $resource;
        $this->sapStockFactory = $sapStockFactory;
        $this->sapStockCollectionFactory = $sapStockCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataSapStockFactory = $dataSapStockFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
    }

    /**
     * Save Data data
     *
     * @param \BowersWilkins\SAPProductInfo\Api\Data\SapStockInterface $sapStock
     * @return SapStock
     * @throws CouldNotSaveException
     */
    public function save(\BowersWilkins\SAPProductInfo\Api\Data\SapStockInterface $sapStock)
    {
        try {
            $this->resource->save($sapStock);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(
                __('Could not save the sapStock: %1', $exception->getMessage()),
                $exception
            );
        }
        return $sapStock;
    }

    /**
     * Load Data data by given Data Identity
     *
     * @param string $sapStockId
     * @return SapStock
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($sapStockId)
    {
        $sapStock = $this->sapStockFactory->create();
        $this->resource->load($sapStock, $sapStockId);
        if (!$sapStock->getId()) {
            throw new NoSuchEntityException(__('Data with Sku "%1" does not exist.', $sapStockId));
        }
        return $sapStock;
    }

    /**
     * Load Data data collection by given search criteria
     *
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     * @param \Magento\Framework\Api\SearchCriteriaInterface $criteria
     * @return \BowersWilkins\SAPProductInfo\Api\Data\SapStockSearchResultsInterface
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $criteria)
    {
        /** @var \BowersWilkins\SAPProductInfo\Model\ResourceModel\SapStock\Collection $collection */
        $collection = $this->sapStockCollectionFactory->create();

        $this->collectionProcessor->process($criteria, $collection);

        /** @var Data\SapStockSearchResultsInterface $searchResults */
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * Delete Data
     *
     * @param \BowersWilkins\SAPProductInfo\Api\Data\SapStockInterface $sapStock
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(\BowersWilkins\SAPProductInfo\Api\Data\SapStockInterface $sapStock)
    {
        try {
            $this->resource->delete($sapStock);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the sapStock: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * Delete Data by given Data Identity
     *
     * @param string $sapStockId
     * @return bool
     * @throws CouldNotDeleteException
     * @throws NoSuchEntityException
     */
    public function deleteById($sapStockId)
    {
        return $this->delete($this->getById($sapStockId));
    }

}
