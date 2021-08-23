<?php
namespace Kirill\Books\Model;
class Post extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'Kirill_books_post';

    protected $_cacheTag = 'Kirill_books_post';

    protected $_eventPrefix = 'Kirill_books_post';

    protected function _construct()
    {
        $this->_init('Kirill\Books\Model\ResourceModel\Post');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }
}
