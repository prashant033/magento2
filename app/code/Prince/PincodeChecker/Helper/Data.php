<?php

namespace Prince\PincodeChecker\Helper;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    /**
     * @var \Prince\PincodeChecker\Model\ResourceModel\Pincodechecker\CollectionFactory
     */
    protected $pincodeCollection;

    /**
     * @var \Magento\Catalog\Model\Product
     */
    protected $product;

    /**
     * @var \Magento\Framework\Controller\ResultFactory
     */
    protected $resultFactory;

    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    protected $scopeConfig;

    /**
     * Constructor
     *
     * @param \Magento\Framework\App\Helper\Context $context
     * @param \Magento\Catalog\Model\Product $product
     * @param \Prince\PincodeChecker\Model\ResourceModel\Pincodechecker\CollectionFactory $pincodeCollection
     * @param \Magento\Framework\Controller\ResultFactory $resultFactory
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Catalog\Model\Product $product,
        \Prince\PincodeChecker\Model\ResourceModel\Pincodechecker\CollectionFactory $pincodeCollection,
        \Magento\Framework\Controller\ResultFactory $resultFactory,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    )
    {
        $this->pincodeCollection = $pincodeCollection;
        $this->product = $product;
        $this->resultFactory = $resultFactory;
        $this->scopeConfig = $scopeConfig;
        parent::__construct($context);
    }

    /**
     * Get collection of pincode
     */
    public function getCollection()
    {
        return $this->pincodeCollection->create();
    }

    /**
     * Get pincode status
     */
    public function getPincodeStatus($pincode)
    {
        $collection = $this->getCollection();
        $collection->addFieldToFilter('pincode', array('eq' => $pincode));
        
        if($collection->getData()){
            return true;
        }else{
            return false;
        }

    }

    /**
     * Get pincode status by product
     */
    public function getProductPincodeStatus($id, $pincode)
    {
        $product = $this->product->load($id);

       // print_r($product);exit;
        $pincodes = $product->getData('pincode');
        $pincodeArr = explode(',', $pincodes);

        if(in_array($pincode, $pincodeArr))
        {
            return true;
        }else{
            return false;
        }
            
    }

    /**
     * Get pincode status message
     * @param $status
     * @param $pincode
     * @param $productId
     * @return string
     */
    public function getMessage($status, $pincode, $productId)
    {
        if($status){
            $message = "<h3>".$this->getSuccessMessage($productId)."</h3>";
        }else{
            $message = "<h3 style='color:red'>".$this->getFailMessage($productId)."</h3>";
    }
    public function getMessage($status, $pincode)
    {
        if($status){
            $message = "<h3>".$this->getSuccessMessage()."</h3>";
        }else{
            $message = "<h3 style='color:red'>".$this->getFailMessage()."</h3>";

        }

        return $message;
    }

    /**
     * Get redirect url
     */
    public function getRedirect()
    {
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setUrl($this->_redirect->getRefererUrl());
        return $resultRedirect;
    }

    /**
     * Check module enable
     */
    public function getIsEnable()
    {
        return $this->scopeConfig->getValue('pincode/general/active', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }

    /**
     * Get check on addtocart config value
     */
    public function getIsCheckonAddtoCart()
    {
        return $this->scopeConfig->getValue('pincode/general/checkaddtocart', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }

    /**
     * Get success message config value
<<<<<<< HEAD
     * @param $productId
     * @return mixed
     */
    public function getSuccessMessage($productId)
    {
        if($productId){
            return $this->scopeConfig->getValue('pincode/general/successmessage_product_level', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        }else {
            return $this->scopeConfig->getValue('pincode/general/successmessage', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        }

=======
     */
    public function getSuccessMessage()
    {
        return $this->scopeConfig->getValue('pincode/general/successmessage', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
>>>>>>> 60fcc5100fa05ceb9f160d787b35be1a2c05e17e
    }

    /**
     * Get fail message config value
<<<<<<< HEAD
     * @param $productId
     * @return mixed
     */
    public function getFailMessage($productId)
    {
        if($productId){
           return $this->scopeConfig->getValue('pincode/general/failmessage_product_level', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        }else{
            return $this->scopeConfig->getValue('pincode/general/failmessage', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        }
    }
}
=======
     */
    public function getFailMessage()
    {
        return $this->scopeConfig->getValue('pincode/general/failmessage', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
}
>>>>>>> 60fcc5100fa05ceb9f160d787b35be1a2c05e17e
