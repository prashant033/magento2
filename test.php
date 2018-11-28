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