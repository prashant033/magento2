<?php
namespace BowersWilkins\SAPProductInfo\Model;

use BowersWilkins\SAPProductInfo\Api\Data\SapStockInterface;
use Magento\Framework\Model\AbstractModel;

/**
 * Class SapStock
 * @package BowersWilkins\SAPProductInfo\Model
 */
class SapStock extends AbstractModel implements SapStockInterface
{


    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\BowersWilkins\SAPProductInfo\Model\ResourceModel\SapStock::class);
    }


    /**
     * Get ID
     *
     * @return int
     */
    public function getId()
    {
        return parent::getData(self::ID);
    }

    /**
     * Get SKU
     *
     * @return string
     */
    public function getSku()
    {
        return parent::getData(self::SKU);
    }

    /**
     * Get stock qty
     *
     * @return int
     */
    public function getStockQty()
    {
        return $this->getData(self::STOCK_QTY);
    }

    /**
     * Get Stock Availablity
     *
     * @return string
     */
    public function getStockAvailablity()
    {
        return $this->getData(self::STOCK_AVAILABLITY);
    }

    /**
     * Get creation time
     *
     * @return string
     */
    public function getCreationTime()
    {
        return $this->getData(self::CREATION_TIME);
    }

    /**
     * Get update time
     *
     * @return string
     */
    public function getUpdateTime()
    {
        return $this->getData(self::UPDATE_TIME);
    }



    /**
     * Set ID
     *
     * @param string $id
     * @return \BowersWilkins\SAPProductInfo\Api\Data\SapStockInterface
     */
    public function setId($id)
    {
        return $this->setData(self::ID, $id);
    }

    /**
     * Set SKU
     *
     * @param string $sku
     * @return \BowersWilkins\SAPProductInfo\Api\Data\SapStockInterface
     */
    public function setSku($sku)
    {
        return $this->setData(self::SKU, $sku);
    }

    /**
     * Set stock qty
     *
     * @param int $stockQty
     * @return \BowersWilkins\SAPProductInfo\Api\Data\SapStockInterface
     */
    public function setStockQty($stockQty)
    {
        return $this->setData(self::STOCK_QTY, $stockQty);
    }

    /**
     * Set stockAvailablity
     *
     * @param string $stockAvailablity
     * @return \BowersWilkins\SAPProductInfo\Api\Data\SapStockInterface
     */
    public function setStockAvailablity($stockAvailablity)
    {
        return $this->setData(self::STOCK_AVAILABLITY, $stockAvailablity);
    }
    /**
     * Set creation time
     *
     * @param string $creationTime
     * @return \BowersWilkins\SAPProductInfo\Api\Data\SapStockInterface
     */
    public function setCreationTime($creationTime)
    {
        return $this->setData(self::CREATION_TIME, $creationTime);
    }

    /**
     * Set update time
     *
     * @param string $updateTime
     * @return \BowersWilkins\SAPProductInfo\Api\Data\SapStockInterface
     */
    public function setUpdateTime($updateTime)
    {
        return $this->setData(self::UPDATE_TIME, $updateTime);
    }
}
