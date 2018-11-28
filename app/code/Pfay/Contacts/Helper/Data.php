<?php
namespace Pfay\Contacts\Helper;

class Data extends \Magento\Catalog\Helper\Data
{
    public function getProduct()
    {
     //   die('rewrite helper');
        return $this->_coreRegistry->registry('current_product');
    }
}