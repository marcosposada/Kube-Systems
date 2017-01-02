<?php

/* * ****************************************************
 * Package   : Brand
 * Author    : ArexWorks
 * Copyright : (c) 2015
 * ***************************************************** */
?>
<?php

$installer = $this;
$setup = new Mage_Eav_Model_Entity_Setup('core_setup');
$installer->startSetup();
$setup->addAttributeGroup('catalog_product', 'Default', 'Product Brand', 1000);
$setup->addAttribute('catalog_product', 'arw_brand', array(
    'group' => 'Product Brand',
    'label' => 'ARW Brand',
    'type' => 'int',
    'input' => 'select',
    'frontend_class' => '',
    'source' => '',
    'backend' => '',
    'frontend' => '',
    'global' => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
    'visible' => true,
    'required' => false,
    'user_defined' => true,
    'searchable' => false,
    'filterable' => false,
    'comparable' => false,
    'visible_on_front' => false,
    'visible_in_advanced_search' => false,
    'unique' => false
));
$setup->updateAttribute('catalog_product', 'arw_brand', 'is_filterable', 1);
$setup->updateAttribute('catalog_product', 'arw_brand', 'is_filterable_in_search', 1);
$setup->updateAttribute('catalog_product', 'arw_brand', 'is_visible_on_front', 1);
$setup->updateAttribute('catalog_product', 'arw_brand', 'used_in_product_listing', 0);
$installer->run("
DROP TABLE IF EXISTS {$this->getTable('arw_brand')};
CREATE TABLE IF NOT EXISTS {$this->getTable('arw_brand')} (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `url_key` varchar(255) NOT NULL DEFAULT '',
  `icon` varchar(255) NOT NULL DEFAULT '',
  `image` varchar(255) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `meta_keywords` text NOT NULL,
  `meta_description` text NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '1',
  `is_featured` smallint(6) NOT NULL DEFAULT '0',
  `priority` int(11) NOT NULL DEFAULT '0',
  `number_of_products` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY (`url_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS {$this->getTable('arw_brand_products')};
CREATE TABLE IF NOT EXISTS {$this->getTable('arw_brand_products')} (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `brand_id` int(11) unsigned NOT NULL,
  `product_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
    ");
$installer->endSetup();
