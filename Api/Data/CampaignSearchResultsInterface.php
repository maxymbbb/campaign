<?php

declare(strict_types=1);

namespace Maksym\Campaign\Api\Data;

interface CampaignSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Campaign list.
     * @return \Maksym\Campaign\Api\Data\CampaignInterface[]
     */
    public function getItems();

    /**
     * Set active list.
     * @param \Maksym\Campaign\Api\Data\CampaignInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

