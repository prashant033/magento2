<?php 
namespace Pfay\Contacts\Controller\Adminhtml\Test;
 
class Edit extends \Magento\Backend\App\Action
{
 
    protected $jsonFactory;
 
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Controller\Result\JsonFactory $jsonFactory
    ) {
        parent::__construct($context);
        $this->jsonFactory = $jsonFactory;
    }
 
    public function execute()
    {
        /** @var \Magento\Framework\Controller\Result\Json $resultJson */
        $resultJson = $this->jsonFactory->create();
       // print_r($resultJson);exit;
        $error = false;
        $messages = [];
        if ($this->getRequest()->getParam('isAjax')) {
           // echo "hellooo";
            $postItems = $this->getRequest()->getParam('items', []);
            if (!count($postItems)) {
                $messages[] = __('Please correct the data sent.');
                $error = true;
            } else {
                foreach (array_keys($postItems) as $entityId) {
                    /** load your model to update the data */
                    $model = $this->_objectManager->create('Pfay\Contacts\Model\contact')->load($entityId);
                    try {
                        $model->setData(array_merge($model->getData(), $postItems[$entityId]));
                        $model->save();
                    } catch (\Exception $e) {
                        $messages[] = "[Error:]  {$e->getMessage()}";
                        $error = true;
                    }
                }
            }
        }
 //echo "edit action";exit;
        return $resultJson->setData([
            'messages' => $messages,
            'error' => $error
        ]);
    }
}