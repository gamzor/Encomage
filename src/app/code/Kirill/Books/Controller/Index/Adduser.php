<?php

namespace Kirill\Books\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\UrlInterface;
use Magento\Framework\View\Result\PageFactory;
use Kirill\Books\Model\PostFactory;

class Adduser extends Action
{
    protected $resultPageFactory;

    private $postFactory;

    private $url;

    public function __construct(UrlInterface $url, PostFactory $postFactory, Context $context, PageFactory $resultPageFactory)
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->postFactory = $postFactory;
        $this->url = $url;
    }

    public function execute()
    {
        if ($this->isCorrectData()) {
            return $this->resultPageFactory->create();
        } else {
            $this->messageManager->addErrorMessage(__("Record Not Change"));
            $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
            $resultRedirect->setUrl($this->url->getUrl('books/index/showdata'));
            return $resultRedirect;
        }
    }

    public function isCorrectData()
    {
        if ($id = $this->getRequest()->getParam("id")) {
            $model = $this->postFactory->create();
            $model->load($id);
            if ($model->getId()) {
                return true;
            } else {
                return false;
            }
        } else {
            return true;
        }
    }
}
