<?php

declare(strict_types=1);

namespace Maksym\Campaign\Model;

use Magento\Framework\Model\AbstractModel;
use Maksym\Campaign\Api\Data\CampaignInterface;

class Campaign extends AbstractModel implements CampaignInterface
{

    /**
     * @inheritDoc
     */
    public function _construct()
    {
        $this->_init(\Maksym\Campaign\Model\ResourceModel\Campaign::class);
    }

    /**
     * @inheritDoc
     */
    public function getCampaignId()
    {
        return $this->getData(self::CAMPAGIN_ID);
    }

    /**
     * @inheritDoc
     */
    public function setCampaignId($campaignId)
    {
        return $this->setData(self::CAMPAGIN_ID, $campaignId);
    }

    /**
     * @inheritDoc
     */
    public function getActive()
    {
        return $this->getData(self::ACTIVE);
    }

    /**
     * @inheritDoc
     */
    public function setActive($active)
    {
        return $this->setData(self::ACTIVE, $active);
    }

    /**
     * @inheritDoc
     */
    public function getTitle()
    {
        return $this->getData(self::TITLE);
    }

    /**
     * @inheritDoc
     */
    public function setTitle($title)
    {
        return $this->setData(self::TITLE, $title);
    }

    /**
     * @inheritDoc
     */
    public function getDescription()
    {
        return $this->getData(self::DESCRIPTION);
    }

    /**
     * @inheritDoc
     */
    public function setDescription($description)
    {
        return $this->setData(self::DESCRIPTION, $description);
    }

    /**
     * @inheritDoc
     */
    public function getUri()
    {
        return $this->getData(self::URI);
    }

    /**
     * @inheritDoc
     */
    public function setUri($uri)
    {
        return $this->setData(self::URI, $uri);
    }

    /**
     * @inheritDoc
     */
    public function getProducts()
    {
        return $this->getData(self::PRODUCTS);
    }

    /**
     * @inheritDoc
     */
    public function setProducts($products)
    {
        return $this->setData(self::PRODUCTS, $products);
    }
}

