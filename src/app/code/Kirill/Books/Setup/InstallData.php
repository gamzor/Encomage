<?php

namespace Kirill\Books\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    protected \Kirill\Books\Model\PostFactory $_postFactory;

    public function __construct(\Kirill\Books\Model\PostFactory $postFactory)
    {
        $this->_postFactory = $postFactory;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $data = [
            'name' => "How to Create SQL Setup Script in Magento 3",
            'status' => 1

        ];
        $post = $this->_postFactory->create();
        $post->addData($data)->save();
    }
}
