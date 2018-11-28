<?php

namespace Mastering\SampleModule\Block;

use Magento\Framework\View\Element\Template;
use Mastering\SampleModule\Model\ResourceModel\Item\Collection;
use Mastering\SampleModule\Model\ResourceModel\Item\CollectionFactory;
class Hello extends Template
{
	/*private $collectionFactory;
	public function __construct(
		Template\Context $context,
		CollectionFactory $collectionFactory,
		array $data=[]
	)
	{
		$this->collectionFactory = $collectionFactory;
		return parent::__construct($context,$data);
	}

	public function getItems()
	{
	  return $this->collectionFactory->create()->getItems();
	}*/
	public function __construct(\Magento\Framework\View\Element\Template\Context $context)
	{
		parent::__construct($context);
	}

	public function sayHello()
	{
		$a=10;
		$b=20;
		$sum=$a+$b;
		return $sum;
		//return __('custom block template action');
	}
	public function substract()
    {
        $a=20;
        $b=10;
        return $a-$b;
    }
    public function multiply()
    {
        $a=20;
        $b=30;
        $result=$a*$b;
        return $result;

    }
	
}
