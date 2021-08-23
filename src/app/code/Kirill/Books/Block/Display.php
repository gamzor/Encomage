<?php
namespace Kirill\Books\Block;
class Display extends \Magento\Framework\View\Element\Template
{
    public function __construct(\Magento\Framework\View\Element\Template\Context $context,\Kirill\Books\Model\PostFactory $postFactory,array $data = [])
    {
        $this->_postFactory=$postFactory;
        parent::__construct($context,$data);
    }

    public function getPostCollection(){
        $post = $this->_postFactory->create();
        return $post->getCollection();
    }
    public function getDeleteAction()
    {
        return $this->getUrl('books/index/delete', ['_secure' => true]);
    }
    public function getEditAction()
    {
        return $this->getUrl('books/index/index', ['_secure' => true]);
    }
    public function getAddAction()
    {
        return $this->getUrl('books/index/Adduser', ['_secure' => true]);
    }
}
