<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace BowersWilkins\SAPProductInfo\Controller\Adminhtml\Stock;

class Delete extends \BowersWilkins\SAPProductInfo\Controller\Adminhtml\Stock
{

    /**
     * Delete action
     *
     * @return \Magento\Backend\Model\View\Result\Redirect
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        // check if we know what should be deleted
        $id = $this->getRequest()->getParam('sap_id');
        if ($id) {
            try {
                // init model and delete
                $model = $this->_objectManager->create(\BowersWilkins\SAPProductInfo\Model\SapStock::class);
                $model->load($id);
                $model->delete();
                // display success message
                $this->messageManager->addSuccess(__('You deleted the sku.'));
                // go to grid
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addError($e->getMessage());
                // go back to edit form
                return $resultRedirect->setPath('*/*/edit', ['sap_id' => $id]);
            }
        }
        // display error message
        $this->messageManager->addError(__('We can\'t find a sku to delete.'));
        // go to grid
        return $resultRedirect->setPath('*/*/');
    }
}
