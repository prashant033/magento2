<?php
namespace BowersWilkins\SAPProductInfo\Block\Adminhtml\SapStock\Edit;

use Magento\Backend\Block\Widget\Context;
use BowersWilkins\SAPProductInfo\Api\SapStockRepositoryInterface;
use Magento\Framework\Exception\LocalizedException;

/**
 * Class GenericButton
 */
class GenericButton
{
    /**
     * @var Context
     */
    protected $context;

    /**
     * @var SapStockRepositoryInterface
     */
    protected $sapStockRepository;

    /**
     * @param Context $context
     * @param SapStockRepositoryInterface $sapStockRepository
     */
    public function __construct(
        Context $context,
        SapStockRepositoryInterface $sapStockRepository
    ) {
        $this->context = $context;
        $this->sapStockRepository = $sapStockRepository;
    }

    /**
     * @return int|null
     */
    public function getSapId()
    {
        try {
            return $this->sapStockRepository->getById(
                $this->context->getRequest()->getParam('sap_id')
            )->getId();
        } catch (LocalizedException $e) {
        }

        return null;
    }

    /**
     * Generate url by route and parameters
     *
     * @param   string $route
     * @param   array $params
     * @return  string
     */
    public function getUrl($route = '', $params = [])
    {
        return $this->context->getUrlBuilder()->getUrl($route, $params);
    }
}
