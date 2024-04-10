<?php

declare(strict_types=1);

namespace Maksym\Campaign\Controller\Adminhtml;

abstract class Campaign extends \Magento\Backend\App\Action
{

    const ADMIN_RESOURCE = 'Maksym_Campaign::top_level';
    protected $_coreRegistry;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Registry $coreRegistry
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry
    ) {
        $this->_coreRegistry = $coreRegistry;
        parent::__construct($context);
    }

    /**
     * Init page
     *
     * @param \Magento\Backend\Model\View\Result\Page $resultPage
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function initPage($resultPage)
    {
        $resultPage->setActiveMenu(self::ADMIN_RESOURCE)
            ->addBreadcrumb(__('Maksym'), __('Maksym'))
            ->addBreadcrumb(__('Campaign'), __('Campaign'));
        return $resultPage;
    }
}

