<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace BowersWilkins\SAPProductInfo\Model\ResourceModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Cms page mysql resource
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class SapStock extends AbstractDb
{
    /**
     * Flag that notifies whether Primary key of table is auto-incremeted
     *
     * @var bool
     */
//    protected $_isPkAutoIncrement = false;



    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('sap_stock_data', 'sap_id');
    }


}
