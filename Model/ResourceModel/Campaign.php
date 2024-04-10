<?php

declare(strict_types=1);

namespace Maksym\Campaign\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Campaign extends AbstractDb
{

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init('maksym_campaign_campaign', 'campaign_id');
    }
}

