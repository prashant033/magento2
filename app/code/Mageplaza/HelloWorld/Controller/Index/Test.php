<?php
namespace Mageplaza\HelloWorld\Controller\Index;

class Test extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory)
	{
		$this->_pageFactory = $pageFactory;
		return parent::__construct($context);
	}

	public function execute()
	{
		
		echo "Hello World";
		echo "<br/>";
		echo "custom module excute";
		exit;
		echo $this->getLayout()->createBlock("Mageplaza\HelloWorld\Block\CustomerAccount")->setTemplate("Lapisbard_General::customer_account.phtml")->toHtml();

		
	}
	
}