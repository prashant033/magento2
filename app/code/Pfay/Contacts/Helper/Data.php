<?php
namespace Pfay\Contacts\Helper;

class Data extends \Magento\Catalog\Helper\Data
{
    public function getProduct()
    {
     //   die('rewrite helper');
        return $this->_coreRegistry->registry('current_product');
    }
    public function RandomFunc()
       {
               echo "call helper function to controllers";
       }
}