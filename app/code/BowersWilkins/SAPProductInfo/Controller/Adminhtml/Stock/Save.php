<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace BowersWilkins\SAPProductInfo\Controller\Adminhtml\Stock;

use Magento\Backend\App\Action;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\Exception\LocalizedException;

class Save extends \Magento\Backend\App\Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'BowersWilkins_SAPProductInfo::sap_product_info_stock';

    /**
     * @var DataPersistorInterface
     */
    protected $dataPersistor;

    /**
     * @var \BowersWilkins\SAPProductInfo\Model\SapStockFactory
     */
    private $pageFactory;

    /**
     * @var \BowersWilkins\SAPProductInfo\Api\SapStockRepositoryInterface
     */
    private $pageRepository;

    /**
     * @param Action\Context $context
     * @param DataPersistorInterface $dataPersistor
     * @param \BowersWilkins\SAPProductInfo\Model\SapStockFactory $pageFactory
     * @param \BowersWilkins\SAPProductInfo\Api\SapStockRepositoryInterface $pageRepository
     *
     */
    public function __construct(
        Action\Context $context,
        DataPersistorInterface $dataPersistor,
        \BowersWilkins\SAPProductInfo\Model\SapStockFactory $pageFactory = null,
        \BowersWilkins\SAPProductInfo\Api\SapStockRepositoryInterface $pageRepository = null
    ) {
        $this->dataPersistor = $dataPersistor;
        $this->pageFactory = $pageFactory
            ?: \Magento\Framework\App\ObjectManager::getInstance()->get(\BowersWilkins\SAPProductInfo\Model\SapStockFactory::class);
        $this->pageRepository = $pageRepository
            ?: \Magento\Framework\App\ObjectManager::getInstance()
                ->get(\BowersWilkins\SAPProductInfo\Api\SapStockRepositoryInterface::class);
        parent::__construct($context);
    }

    /**
     * Save action
     *
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($data) {
            $id = $this->getRequest()->getParam('sap_id');


            if (empty($data['sap_id'])) {
                $data['sap_id'] = null;
            }

            /** @var \Magento\Cms\Model\Block $model */
            $model = $this->_objectManager->create(\BowersWilkins\SAPProductInfo\Model\SapStock::class)->load($id);
            if (!$model->getId() && $id) {
                $this->messageManager->addError(__('This sku no longer exists.'));
                return $resultRedirect->setPath('*/*/');
            }

            $model->setData($data);

            try {
                $model->save();
                $this->messageManager->addSuccess(__('You saved the block.'));
                $this->dataPersistor->clear('sap_data');

                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['sku' => $model->getSku()]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('Something went wrong while saving the block.'));
            }

            $this->dataPersistor->set('sap_data', $data);
            return $resultRedirect->setPath('*/*/edit', ['sku' => $this->getRequest()->getParam('sku')]);
        }
        return $resultRedirect->setPath('*/*/');
    }
}
