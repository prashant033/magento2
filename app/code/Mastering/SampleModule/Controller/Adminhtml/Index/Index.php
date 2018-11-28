<?php

namespace Mastering\SampleModule\Controller\Adminhtml\Index;
use Magento\Framework\Controller\ResultFactory;

class Index extends \Magento\Backend\App\Action
{
	public function execute()
	{
		/**\Magento\Framework\Controller\Result\Raw $result*/
		/*
		$result=$this->resultFactory->create(ResultFactory::TYPE_RAW);
		$result->setContents('Welcome to the admin pannel custom module');
		return $result;*/
		return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
	}
}