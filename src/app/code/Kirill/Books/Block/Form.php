<?php

namespace Kirill\Books\Block;

use Magento\Backend\Block\Template\Context;
use Magento\Framework\View\Element\Template;
use Kirill\Books\Model\PostFactory;

class Form extends Template
{
    private $postFactory;

    public function __construct(PostFactory $postFactory, Context $context, array $data = [])
    {
        parent::__construct($context, $data);
        $this->postFactory = $postFactory;
    }

    public function getFormAction()
    {
        return $this->getUrl('books/index/submit', ['_secure' => true]);
    }

    public function getAllData()
    {
        $id = $this->getRequest()->getParam("id");
        $model = $this->postFactory->create();
        return $model->load($id);
    }
}
