<?php

namespace BowersWilkins\SAPProductInfo\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
	protected $_sapStockFactory;

	public function __construct(\BowersWilkins\SAPProductInfo\Model\SapStockFactory $sapStockFactory)
	{
		$this->_sapStockFactory = $sapStockFactory;
	}

	public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
	{
		$data = [
			'sku' => 'PSR',
			'stock_qty' => '2500',
			'stock_availablity' => 'MEDIUM'
		];
		$post = $this->_sapStockFactory->create();
		$post->addData($data)->save();
	}
}
