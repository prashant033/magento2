<?php
namespace Pfay\Contacts\Controller\Adminhtml\Test;
use Magento\Backend\App\Action;

class Index extends \Magento\Backend\App\Action
{
    public function execute()
    {
    	 //echo "admin controllers action";exit;
    	$this->_view->loadLayout();
        $this->_view->renderLayout();
       
    }
}
