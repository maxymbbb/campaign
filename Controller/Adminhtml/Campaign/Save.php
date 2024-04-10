<?php

declare(strict_types=1);

namespace Maksym\Campaign\Controller\Adminhtml\Campaign;

use Magento\Framework\Exception\LocalizedException;

class Save extends \Magento\Backend\App\Action
{

    protected $dataPersistor;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor
    ) {
        $this->dataPersistor = $dataPersistor;
        parent::__construct($context);
    }

    /**
     * Save action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();
        if ($data) {
            $data = $this->getRequest()->getPostValue();

            if(isset($data['data']) && $data['data']['products']) {
                $data['products'] = implode(',', $data['data']['products']);
            }

            $id = $this->getRequest()->getParam('campaign_id');

            $model = $this->_objectManager->create(\Maksym\Campaign\Model\Campaign::class)->load($id);
            if (!$model->getId() && $id) {
                $this->messageManager->addErrorMessage(__('This Campaign no longer exists.'));
                return $resultRedirect->setPath('*/*/');
            }

            $model->setData($data);

            try {
                $model->save();
                $this->messageManager->addSuccessMessage(__('You saved the Campaign.'));
                $this->dataPersistor->clear('maksym_campaign_campaign');

                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['campaign_id' => $model->getId()]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the Campaign.'));
            }

            $this->dataPersistor->set('maksym_campaign_campaign', $data);
            return $resultRedirect->setPath('*/*/edit', ['campaign_id' => $this->getRequest()->getParam('campaign_id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }
}

