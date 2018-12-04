<?php
namespace BowersWilkins\SAPProductInfo\Api\Data;

/**
 * Interface SapStockInterface
 * @package BowersWilkins\SAPProductInfo\Api\Data
 */
interface SapStockInterface
{
    /**#@+
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const ID                       = 'sap_id';
    const SKU                       = 'sku';
    const STOCK_QTY                 = 'stock_qty';
    const STOCK_AVAILABLITY         = 'stock_availablity';
    const CREATION_TIME             = 'creation_time';
    const UPDATE_TIME               = 'update_time';

    /**#@-*/

    /**
     * Get ID
     *
     * @return int
     */
    public function getId();

    /**
     * Get SKU
     *
     * @return string|null
     */
    public function getSku();

    /**
     * Get stock qty
     *
     * @return int|null
     */
    public function getStockQty();

    /**
     * Get stock availablity
     *
     * @return string|null
     */
    public function getStockAvailablity();

    /**
     * Get creation time
     *
     * @return string|null
     */
    public function getCreationTime();

    /**
     * Get update time
     *
     * @return string|null
     */
    public function getUpdateTime();


    /**
     * Set ID
     *
     * @param int $id
     * @return \BowersWilkins\SAPProductInfo\Api\Data\SapStockInterface
     */
    public function setId($id);
    /**
     * Set SKU
     *
     * @param string $sku
     * @return \BowersWilkins\SAPProductInfo\Api\Data\SapStockInterface
     */
    public function setSku($sku);

    /**
     * Set stockQty
     *
     * @param int $stockQty
     * @return \BowersWilkins\SAPProductInfo\Api\Data\SapStockInterface
     */
    public function setStockQty($stockQty);

    /**
     * Set stockAvailablity
     *
     * @param string $stockAvailablity
     * @return \BowersWilkins\SAPProductInfo\Api\Data\SapStockInterface
     */
    public function setStockAvailablity($stockAvailablity);


    /**
     * Set creation time
     *
     * @param string $creationTime
     * @return \BowersWilkins\SAPProductInfo\Api\Data\SapStockInterface
     */
    public function setCreationTime($creationTime);

    /**
     * Set update time
     *
     * @param string $updateTime
     * @return \BowersWilkins\SAPProductInfo\Api\Data\SapStockInterface
     */
    public function setUpdateTime($updateTime);

}
