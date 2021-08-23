<?php

namespace Kirill\Books\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\UrlInterface;
use Magento\Framework\View\Result\PageFactory;
use Kirill\Books\Model\PostFactory;

class AddSubmit extends Action
{
    protected $resultPageFactory;
    protected $postFactory;
    private $url;

    public function __construct(
        UrlInterface $url,
        Context $context,
        PageFactory $resultPageFactory,
        PostFactory $postFactory
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->postFactory = $postFactory;
        $this->url = $url;
        parent::__construct($context);
    }

    public function execute()
    {
        try {
            $data = (array)$this->getRequest()->getPost();

            if ($data) {
                $model = $this->postFactory->create();
                $model->addData($data)->save();
                $this->messageManager->addSuccessMessage(__("Data Add Successfully."));
            }
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e, __("We can\'t submit your request, Please try again."));
        }
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setUrl($this->url->getUrl('books/index/showdata'));
        return $resultRedirect;
    }
}
