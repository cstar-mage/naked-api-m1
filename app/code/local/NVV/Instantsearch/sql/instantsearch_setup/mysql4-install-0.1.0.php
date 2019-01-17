<?php

$installer = $this;

$installer->startSetup(); 
$installer->setConfigData('instantsearch/catalog/searchenabled','0');
$installer->setConfigData('instantsearch/catalog/searchname','1');
$installer->setConfigData('instantsearch/catalog/searcshortdescription','1');
$installer->setConfigData('instantsearch/catalog/searchdetaildescription','1');
$installer->setConfigData('instantsearch/catalog/searchproducttag','1');
$installer->setConfigData('instantsearch/catalog/searchproductlimit','6');
$installer->setConfigData('instantsearch/catalog/searchproductthumb','100');
$installer->setConfigData('instantsearch/catalog/searchproductlimitpage','10');
$installer->endSetup(); 
