<?php
namespace Pfay\Contacts\Controller\Adminhtml\Test;
use Magento\Backend\App\Action;

class Add extends \Magento\Backend\App\Action
{
   /* public function execute()
    {
       die('admin grid test');
    }*/
     public function execute()
    {
    	//echo "add new action";exit;
       $this->_view->loadLayout();
        $this->_view->renderLayout();

        $contactDatas = $this->getRequest()->getParam('contact');
        if(is_array($contactDatas)) {
            $contact = $this->_objectManager->create(Contact::class);
            $contact->setData($contactDatas)->save();
            $resultRedirect = $this->resultRedirectFactory->create();
            return $resultRedirect->setPath('*/*/index');
        }
}
}