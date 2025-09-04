<?php

namespace BzoTech\Categories\Setup;

use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Catalog\Model\Category\Attribute\Backend\Image;
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;

class InstallData implements InstallDataInterface
{
    protected $eav_setup;
    protected $eav_setup_factory;
    protected $connection;
    protected $eav_config;

    public function __construct(
        EavSetupFactory $eavSetupFactory,
        \Magento\Framework\App\ResourceConnection $connection,
        \Magento\Eav\Model\Config $eavConfig
    )
    {
        $this->eav_setup_factory = $eavSetupFactory;
        $this->connection        = $connection->getConnection();
        $this->eav_config        = $eavConfig;
    }

    public function install(
        ModuleDataSetupInterface $setup,
        ModuleContextInterface $context
    )
    {
        $setup->startSetup();

        //create Category Attributes
        $this->createCategoryAttributes($setup);

        $setup->endSetup();
    }

    protected function createCategoryAttributes($setup)
    {
        $eav_setup = $this->eav_setup_factory->create(['setup' => $setup]);
        $eav_setup->addAttribute(
            \Magento\Catalog\Model\Category::ENTITY,
            'bzotech_category_image',
            [
                'type' => 'varchar',
                'label' => 'Image',
                'input' => 'image',
                'backend' => Image::class,
                'required' => false,
                'sort_order' => 100,
                'global' => ScopedAttributeInterface::SCOPE_STORE,
                'group' => 'BZOTech Category'
            ]
        );

        $eav_setup->addAttribute(
            \Magento\Catalog\Model\Category::ENTITY,
            'bzotech_category_description',
            [
                'type' => 'text',
                'label' => 'Meta Description',
                'input' => 'textarea',
                'required' => false,
                'sort_order' => 110,
                'global' => ScopedAttributeInterface::SCOPE_STORE,
                'group' => 'BZOTech Category'
            ]
        );
    }
}
