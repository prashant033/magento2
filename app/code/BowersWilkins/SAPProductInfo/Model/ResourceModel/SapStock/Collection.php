<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace BowersWilkins\SAPProductInfo\Model\ResourceModel\SapStock;

use \BowersWilkins\SAPProductInfo\Model\ResourceModel\AbstractCollection;

/**
 * Class Collection
 * @package BowersWilkins\SAPProductInfo\Model\ResourceModel\SapStock
 */
class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'sap_id';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\BowersWilkins\SAPProductInfo\Model\SapStock::class, \BowersWilkins\SAPProductInfo\Model\ResourceModel\SapStock::class);
    }
}
