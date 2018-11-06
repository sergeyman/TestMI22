<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace ASV\TestMI22\Setup;

use Magento\Eav\Setup\EavSetup;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;

/**
 * Upgrade Data script
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class UpgradeData implements UpgradeDataInterface
{
    /**
     * Category setup factory
     *
     * @var CategorySetupFactory
     */
    private $categorySetupFactory;

    /**
     * EAV setup factory
     *
     * @var \Magento\Eav\Setup\EavSetupFactory
     */
    private $eavSetupFactory;

    /**
     * @var UpgradeWidgetData
     */
    private $upgradeWidgetData;

    /**
     * @var UpgradeWebsiteAttributes
     */
    private $upgradeWebsiteAttributes;

    /**
     * Constructor
     *
     * @param CategorySetupFactory $categorySetupFactory
     * @param \Magento\Eav\Setup\EavSetupFactory $eavSetupFactory
     * @param UpgradeWidgetData $upgradeWidgetData
     * @param UpgradeWebsiteAttributes $upgradeWebsiteAttributes
     */
    public function __construct(
        CategorySetupFactory $categorySetupFactory,
        \Magento\Eav\Setup\EavSetupFactory $eavSetupFactory,
        UpgradeWidgetData $upgradeWidgetData,
        UpgradeWebsiteAttributes $upgradeWebsiteAttributes
    ) {
        $this->categorySetupFactory = $categorySetupFactory;
        $this->eavSetupFactory = $eavSetupFactory;
        $this->upgradeWidgetData = $upgradeWidgetData;
        $this->upgradeWebsiteAttributes = $upgradeWebsiteAttributes;
    }

    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {die('mmm');
        $setup->startSetup();
        if ($context->getVersion()
            && version_compare($context->getVersion(), '2.0.1') < 0
        ) {
            $eavSetup = $this->eavSetupFactory->create();
            $eavSetup->addAttribute(
                \Magento\Catalog\Model\Product::ENTITY,
                'clothing_material',
                [
                    'group' => 'General',
                    'type' => 'varchar',
                    'label' => 'Clothing Material',
                    'input' => 'select',
                    'source' => 'Learning\ClothingMaterial\Model\Attribute\Source\Material',
                    'frontend' => 'Learning\ClothingMaterial\Model\Attribute\Frontend\Material',
                    'backend' => 'Learning\ClothingMaterial\Model\Attribute\Backend\Material',
                    'required' => false,
                    'sort_order' => 50,
                    'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                    'is_used_in_grid' => false,
                    'is_visible_in_grid' => false,
                    'is_filterable_in_grid' => false,
                    'visible' => true,
                    'is_html_allowed_on_front' => true,
                    'visible_on_front' => true
                ]
            );
        }
    }
}
