<?php
namespace BowersWilkins\SAPProductInfo\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

/**
 * Interface SapStockRepositoryInterface
 * @package BowersWilkins\SAPProductInfo\Api
 */
interface SapStockRepositoryInterface
{
    /**
     * Save stock.
     *
     * @param \BowersWilkins\SAPProductInfo\Api\Data\SapStockInterface $stock
     * @return \BowersWilkins\SAPProductInfo\Api\Data\SapStockInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(\BowersWilkins\SAPProductInfo\Api\Data\SapStockInterface $stock);

    /**
     * Retrieve page.
     *
     * @param int $stockId
     * @return \BowersWilkins\SAPProductInfo\Api\Data\SapStockInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($stockId);

    /**
     * Retrieve pages matching the specified criteria.
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \BowersWilkins\SAPProductInfo\Api\Data\SapStockSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    /**
     * Delete page.
     *
     * @param \BowersWilkins\SAPProductInfo\Api\Data\SapStockInterface $stock
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(\BowersWilkins\SAPProductInfo\Api\Data\SapStockInterface $stock);

    /**
     * Delete page by ID.
     *
     * @param int $stockId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($stockId);
}
