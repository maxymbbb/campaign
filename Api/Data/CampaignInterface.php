<?php

declare(strict_types=1);

namespace Maksym\Campaign\Api\Data;

interface CampaignInterface
{

    const ACTIVE = 'active';
    const PRODUCTS = 'products';
    const CAMPAGIN_ID = 'campaign_id';
    const DESCRIPTION = 'description';
    const TITLE = 'title';
    const URI = 'uri';

    /**
     * Get campaign_id
     * @return string|null
     */
    public function getCampaignId();

    /**
     * Set campaign_id
     * @param string $campaignId
     * @return \Maksym\Campaign\Campaign\Api\Data\CampaignInterface
     */
    public function setCampaignId($campaignId);

    /**
     * Get active
     * @return string|null
     */
    public function getActive();

    /**
     * Set active
     * @param string $active
     * @return \Maksym\Campaign\Campaign\Api\Data\CampaignInterface
     */
    public function setActive($active);

    /**
     * Get title
     * @return string|null
     */
    public function getTitle();

    /**
     * Set title
     * @param string $title
     * @return \Maksym\Campaign\Campaign\Api\Data\CampaignInterface
     */
    public function setTitle($title);

    /**
     * Get description
     * @return string|null
     */
    public function getDescription();

    /**
     * Set description
     * @param string $description
     * @return \Maksym\Campaign\Campaign\Api\Data\CampaignInterface
     */
    public function setDescription($description);

    /**
     * Get uri
     * @return string|null
     */
    public function getUri();

    /**
     * Set uri
     * @param string $uri
     * @return \Maksym\Campaign\Campaign\Api\Data\CampaignInterface
     */
    public function setUri($uri);

    /**
     * Get products
     * @return string|null
     */
    public function getProducts();

    /**
     * Set products
     * @param string $products
     * @return \Maksym\Campaign\Campaign\Api\Data\CampaignInterface
     */
    public function setProducts($products);
}

