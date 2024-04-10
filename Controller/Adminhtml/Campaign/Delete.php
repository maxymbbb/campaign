<?php

declare(strict_types=1);

namespace Maksym\Campaign\Controller\Adminhtml\Campaign;

class Delete extends \Maksym\Campaign\Controller\Adminhtml\Campaign
{

    /**
     * Delete action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        // check if we know what should be deleted
        $id = $this->getRequest()->getParam('campaign_id');
        if ($id) {
            try {
                // init model and delete
                $model = $this->_objectManager->create(\Maksym\Campaign\Model\Campaign::class);
                $model->load($id);
                $model->delete();
                // display success message
                $this->messageManager->addSuccessMessage(__('You deleted the Campaign.'));
                // go to grid
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addErrorMessage($e->getMessage());
                // go back to edit form
                return $resultRedirect->setPath('*/*/edit', ['campaign_id' => $id]);
            }
        }
        // display error message
        $this->messageManager->addErrorMessage(__('We can\'t find a Campaign to delete.'));
        // go to grid
        return $resultRedirect->setPath('*/*/');
    }
}

