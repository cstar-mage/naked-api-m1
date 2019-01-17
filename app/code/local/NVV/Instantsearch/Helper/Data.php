<?php

class NVV_Instantsearch_Helper_Data extends Mage_Core_Helper_Abstract
{
	public function getsearchurl()
	{
		return $search=Mage::getStoreConfig('instantsearch/catalog/searchenabled');
		
	}
    
     public function getStoreCategories()
     {
           $helper = Mage::helper('catalog/category');
           return $helper->getStoreCategories();
     } 
}
	 