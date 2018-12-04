<?php
namespace BowersWilkins\SAPProductInfo\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface SapStockSearchResultsInterface
 * @package BowersWilkins\SAPProductInfo\Api\Data
 */
interface SapStockSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get sapStock list.
     *
     * @return \BowersWilkins\SAPProductInfo\Api\Data\SapStockInterface[]
     */
    public function getItems();

    /**
     * Set pages list.
     *
     * @param \BowersWilkins\SAPProductInfo\Api\Data\SapStockInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
