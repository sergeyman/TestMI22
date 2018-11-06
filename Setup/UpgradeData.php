<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace ASV\TestMI22\Setup;

use	Magento\Framework\Setup\UpgradeDataInterface;
use	Magento\Framework\Setup\ModuleContextInterface;
use	Magento\Framework\Setup\ModuleDataSetupInterface;

class	UpgradeData	implements	UpgradeDataInterface	{
    protected	$categorySetupFactory;
    public	function
    __construct(\Magento\Catalog\Setup\CategorySetupFactory $categorySetupFactory)
    {
        $this->categorySetupFactory	=	$categorySetupFactory;
    }
    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        die('in upgrade');
        $setup->startSetup();
        /// var_dump($context->getVersion());die;
        ///
        //По умолчанию функция version_compare() возвращает -1, если первая версия меньше второй; 0, когда они равны; 1, если вторая меньше первой.
        if (version_compare($context->getVersion(), '1.0.6') < 0
        ) {
            die('in version_compare');
            /** @var CategorySetup $categorySetup */
            $categorySetup = $this->categorySetupFactory->create(['setup' => $setup]);

            $categorySetup->addAttribute(
                \Magento\Catalog\Model\Product::ENTITY,
                'clothing_material25',
                [
                    'group' => 'General',
                    'type' => 'varchar',
                    'label' => 'Clothing Material25',
                    'input' => 'select',
                    'source' => 'ASV\AddAttr\Model\Attribute\Source\Material',
                    'frontend' => 'ASV\AddAttr\Model\Attribute\Frontend\Material',
                    'backend' => 'ASV\AddAttr\Model\Attribute\Backend\Material',
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
        //die('upgraded');
    }
}
