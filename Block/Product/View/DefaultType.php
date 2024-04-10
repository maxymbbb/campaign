<?php

namespace Maksym\Campaign\Block\Product\View;


use Magento\Catalog\Model\Product;
use Maksym\Campaign\Model\CampaignRepository;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Catalog\Block\Product\View\AbstractView;
use Magento\Catalog\Block\Product\Context;
use Magento\Framework\Stdlib\ArrayUtils;

class DefaultType extends AbstractView
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
     * @param ArrayUtils $arrayUtils
     * @param CampaignRepository $campaignRepository
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param array $data
     */
    public function __construct(Context               $context,
                                ArrayUtils            $arrayUtils,
                                CampaignRepository    $campaignRepository,
                                SearchCriteriaBuilder $searchCriteriaBuilder,
                                array                 $data = [],

    )
    {
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->campaignRepository = $campaignRepository;

        parent::__construct($context, $arrayUtils, $data);
    }

    /**
     * @param Product $product
     * @return array
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getCampaignByProduct(Product $product): array
    {
        $result = [];
        $searchCriteria = $this->searchCriteriaBuilder->addFilter(
            'products',
            "%" . $product->getId() . "%",
            'like'
        )->create();
        $items = $this->campaignRepository->getList($searchCriteria);
        foreach ($items->getItems() as $value) {
            $result[] = $value->getTitle();
        }
        return $result;
    }
}

