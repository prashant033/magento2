<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace BowersWilkins\SAPProductInfo\Block\Adminhtml;

/**
 * Adminhtml cms blocks content block
 */
class SapStock extends \Magento\Backend\Block\Widget\Grid\Container
{
    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_blockGroup = 'BowersWilkins_SAPProductInfo';
        $this->_controller = 'adminhtml_stock';
        $this->_headerText = __('Static Blocks');
        $this->_addButtonLabel = __('Add New Block');
        parent::_construct();
    }
}
