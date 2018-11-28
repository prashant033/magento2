<?php

namespace Mastering\SampleModule\Controller\Index;
use Magento\Framework\Controller\ResultFactory;

class Index extends \Magento\Framework\App\Action\Action
{
	
	public function execute()
	{
		
		$result=$this->resultFactory->create(ResultFactory::TYPE_PAGE);
	//	$result->setContents('Hello World frontend test');
		return $result;
		

		
	}

}