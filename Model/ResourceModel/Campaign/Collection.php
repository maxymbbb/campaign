<?php

declare(strict_types=1);

namespace Maksym\Campaign\Model\ResourceModel\Campaign;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    /**
     * @inheritDoc
     */
    protected $_idFieldName = 'campaign_id';

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init(
            \Maksym\Campaign\Model\Campaign::class,
            \Maksym\Campaign\Model\ResourceModel\Campaign::class
        );
    }
}

