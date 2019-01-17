<?php
/**
 * Instant Search Custom module
 * Created by Cretu Razvan
 */


/**
 * Product search result block *
 */
class NVV_Instantsearch_Block_Result extends Mage_CatalogSearch_Block_Result
{
    protected $_jsonProductCollection;

    public function getResultCount()
    {
        if (!$this->getData('result_count')) {
            $size = $this->_getProductCollection()->getSize();
            $additionalSize = count($this->getJsonProducts());
            $this->_getQuery()->setNumResults($size + $additionalSize);
            $this->setResultCount($size + $additionalSize);
        }
        return $this->getData('result_count');
    }

    public function getJsonProducts() {
        if (is_null($this->_jsonProductCollection)) {
            $this->_jsonProductCollection = $this->getListBlock()->getJsonProducts();
        }

        return $this->_jsonProductCollection;
    }
}
