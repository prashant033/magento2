<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace BowersWilkins\SAPProductInfo\Controller\Adminhtml\Stock;

use Magento\Backend\App\Action\Context;
use BowersWilkins\SAPProductInfo\Api\SapStockRepositoryInterface as SapStockRepository;
use Magento\Framework\Controller\Result\JsonFactory;
use BowersWilkins\SAPProductInfo\Api\Data\SapStockInterface;

/**
 * Cms page grid inline edit controller
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class InlineEdit extends \Magento\Backend\App\Action
{
    /**
     * Authorization level of a basic admin session
     */
    const ADMIN_RESOURCE = 'BowersWilkins_SAPProductInfo::sap_product_info_stock';


    /**
     * @var SapStockRepository
     */
    protected $sapStockRepository;

    /**
     * @var \Magento\Framework\Controller\Result\JsonFactory
     */
    protected $jsonFactory;

    /**
     * InlineEdit constructor.
     * @param Context $context
     * @param SapStockRepository $sapStockRepository
     * @param JsonFactory $jsonFactory
     */
    public function __construct(
        Context $context,
        SapStockRepository $sapStockRepository,
        JsonFactory $jsonFactory
    ) {
        parent::__construct($context);
        $this->sapStockRepository = $sapStockRepository;
        $this->jsonFactory = $jsonFactory;
    }

    /**
     * @return $this|\Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function execute()
    {
        /** @var \Magento\Framework\Controller\Result\Json $resultJson */
        $resultJson = $this->jsonFactory->create();
        $error = false;
        $messages = [];

        if ($this->getRequest()->getParam('isAjax')) {
            $postItems = $this->getRequest()->getParam('items', []);
            if (!count($postItems)) {
                $messages[] = __('Please correct the data sent.');
                $error = true;
            } else {
                foreach (array_keys($postItems) as $sap_id) {
                    /** @var \Magento\Cms\Model\Block $sapStock */
                    $sapStock = $this->sapStockRepository->getById($sap_id);
                    try {
                        $sapStock->setData(array_merge($sapStock->getData(), $postItems[$sap_id]));
                        $this->sapStockRepository->save($sapStock);
                    } catch (\Exception $e) {
                        $messages[] = $this->getErrorWithBlockId(
                            $sapStock,
                            __($e->getMessage())
                        );
                        $error = true;
                    }
                }
            }
        }

        return $resultJson->setData([
            'messages' => $messages,
            'error' => $error
        ]);
    }


    /**
     * Add page title to error message
     *
     * @param SapStockInterface $page
     * @param string $errorText
     * @return string
     */
    protected function getErrorWithPageId(SapStockInterface $sapStock, $errorText)
    {
        return '[Data Sku: ' . $sapStock->getId() . '] ' . $errorText;
    }


}
