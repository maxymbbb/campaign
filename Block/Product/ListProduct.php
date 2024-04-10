<?php

namespace Maksym\Campaign\Block\Product;

use Magento\Catalog\Api\CategoryRepositoryInterface;
use Magento\Catalog\Block\Product\Context;
use Magento\Catalog\Helper\Output as OutputHelper;
use Magento\Catalog\Model\Layer\Resolver;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Data\Helper\PostHelper;
use Magento\Framework\Url\Helper\Data;
use Maksym\Campaign\Model\CampaignRepository;
use Magento\Catalog\Block\Product\ListProduct as BaseListProduct;
class ListProduct extends BaseListProduct
{
    /**
     * @var CampaignRepository
     */
    public $campaignRepository;

    /**
     * @var SearchCriteriaBuilder
     */
    public $searchCriteriaBuilder;

    /**
     * @param Context $context
     * @param PostHelper $postDataHelper
     * @param Resolver $layerResolver
     * @param CategoryRepositoryInterface $categoryRepository
     * @param Data $urlHelper
     * @param CampaignRepository $campaignRepository
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param array $data
     * @param OutputHelper|null $outputHelper
     */
    public function __construct(Context                     $context,
                                PostHelper                  $postDataHelper,
                                Resolver                    $layerResolver,
                                CategoryRepositoryInterface $categoryRepository,
                                Data                        $urlHelper,
                                CampaignRepository   $campaignRepository,
                                SearchCriteriaBuilder $searchCriteriaBuilder,
                                array                       $data = [], ?OutputHelper $outputHelper = null,
                                )
    {
        $this->campaignRepository = $campaignRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        parent::__construct($context, $postDataHelper, $layerResolver, $categoryRepository, $urlHelper, $data, $outputHelper);
    }


    protected function _toHtml()
    {
        $this->setModuleName($this->extractModuleName('Magento\Catalog\Block\Product\ListProduct'));
        return parent::_toHtml();
    }

    /**
     * @return array
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getActiveCampaigns(): array
    {
        $result = [];
        $searchCriteria = $this->searchCriteriaBuilder->addFilter(
            'active',
            1,
            'eq'
        )->create();
        $items = $this->campaignRepository->getList($searchCriteria);
        foreach ($items->getItems() as $value) {
            $campaignProducts = explode(",", $value->getProducts());
            foreach ($campaignProducts as $product) {
                $result[$product] = $value->getTitle();

            }
        }
        return $result;
    }


}
