<?php

declare(strict_types=1);

namespace Maksym\Campaign\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface CampaignRepositoryInterface
{

    /**
     * Save Campaign
     * @param \Maksym\Campaign\Api\Data\CampaignInterface $campaign
     * @return \Maksym\Campaign\Api\Data\CampaignInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Maksym\Campaign\Api\Data\CampaignInterface $campaign
    );

    /**
     * Retrieve Campaign
     * @param string $campaignId
     * @return \Maksym\Campaign\Api\Data\CampaignInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($campaignId);

    /**
     * Retrieve Campaign matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Maksym\Campaign\Api\Data\CampaignSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete Campaign
     * @param \Maksym\Campaign\Api\Data\CampaignInterface $campaign
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Maksym\Campaign\Api\Data\CampaignInterface $campaign
    );

    /**
     * Delete Campaign by ID
     * @param string $campaignId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($campaignId);
}

