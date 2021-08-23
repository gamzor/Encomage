<?php

namespace Kirill\Books\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class UpgradeData implements UpgradeDataInterface
{
    protected \Kirill\Books\Model\PostFactory $_postFactory;

    public function __construct(\Kirill\Books\Model\PostFactory $postFactory)
    {
        $this->_postFactory = $postFactory;
    }

    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        if (version_compare($context->getVersion(), '1.2.0', '<')) {
            $data = [
                ['name'         => "Magento 2 Events",
                'status'       => 1],
                ['name'         => "Magento 3 Events",
                'status'       => 1
                    ]
                ];
            foreach ($data as $item) {
            $post = $this->_postFactory->create();
            $post->addData($item)->save();
            }
        }
    }
}
