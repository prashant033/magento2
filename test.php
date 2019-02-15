<?php
use Magento\Framework\App\Bootstrap;

require __DIR__ . '/app/bootstrap.php';
$params =  $_SERVER;
$bootstrap = Bootstrap::create(BP, $params);

$obj = $bootstrap->getObjectManager();

$state = $obj->get('Magento\Framework\App\State');
$state->setAreaCode('frontend');

$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
 $storeManager = $objectManager->get('\Magento\Store\Model\StoreManagerInterface');
 $websiteId = $storeManager->getWebsite()->getWebsiteId();
  $store = $storeManager->getStore();
  $storeId = $store->getStoreId();
 // print_r($storeId);exit;
  $customerFactory = $objectManager->get('\Magento\Customer\Model\CustomerFactory'); 
    $customer=$customerFactory->create();
    $customer->setWebsiteId($websiteId);
   // print_r($customer->getData());exit;
 $customer->load('1');// load customer by using ID
    $data= $customer->getData();
    print_r($data);exit;
$product_id='1';
//$product = $objectManager->create('Magento\Catalog\Model\ResourceModel\Product\Collection');
//echo "<pre>";
//print_r($product->load($product_id));

//print_r($product->getData());
$sessions=$objectManager->create('Magento\Customer\Model\Session');
echo "<pre>";
print_r($sessions->getData());exit;
echo "test custom script";

?>


<p>{{widget type="Magento\Cms\Block\Widget\Block" template="widget/static_block/default.phtml" block_id="home_banner"}} 
{{block class="Pfay\Contacts\Block\View" template="Pfay_Contacts::hello.phtml"}} 
{{widget type="Magento\Cms\Block\Widget\Block" template="widget/static_block/default.phtml" block_id="9"}}
{{widget type="Magento\CatalogWidget\Block\Product\ProductsList" title="Wines of 2019" show_pager="0" products_per_page="5" products_count="10" template="product/widget/content/grid.phtml" conditions_encoded="^[`1`:^[`type`:`Magento||CatalogWidget||Model||Rule||Condition||Combine`,`aggregator`:`all`,`value`:`1`,`new_child`:``^],`1--1`:^[`type`:`Magento||CatalogWidget||Model||Rule||Condition||Product`,`attribute`:`category_ids`,`operator`:`==`,`value`:`7`^]^]" page_var_name="pwxyld"}} 
{{widget type="Magento\CatalogWidget\Block\Product\ProductsList" display_type="new_products" show_pager="0" products_count="5" template="product/widget/content/grid.phtml" title="New Arrivals" conditions_encoded="^[`1`:^[`type`:`Magento||CatalogWidget||Model||Rule||Condition||Combine`,`aggregator`:`all`,`value`:`1`,`new_child`:``^],`1--1`:^[`type`:`Magento||CatalogWidget||Model||Rule||Condition||Product`,`attribute`:`category_ids`,`operator`:`==`,`value`:`3`^]^]"}} 
{{widget type="Magento\CatalogWidget\Block\Product\ProductsList" title="Featured Wines" show_pager="0" products_count="4" template="product/widget/content/grid.phtml" conditions_encoded="^[`1`:^[`type`:`Magento||CatalogWidget||Model||Rule||Condition||Combine`,`aggregator`:`all`,`value`:`1`,`new_child`:``^],`1--1`:^[`type`:`Magento||CatalogWidget||Model||Rule||Condition||Product`,`attribute`:`country_of_manufacture`,`operator`:`==`,`value`:`IN`^]^]"}} {{widget type="Magento\Cms\Block\Widget\Block" template="widget/static_block/default.phtml" block_id="home_blogs"}} 
{{widget type="Magento\Cms\Block\Widget\Block" template="widget/static_block/default.phtml" block_id="home_advertisement1"}} 
{{widget type="Magento\Cms\Block\Widget\Block" template="widget/static_block/default.phtml" block_id="home_brands"}} </p>