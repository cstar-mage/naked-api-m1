<?php
/**
 * Instant Search Custom module
 * Created by Cretu Razvan
 */


/**
 * Product list
 *
 */
class NVV_Instantsearch_Block_Product_List extends Mage_Catalog_Block_Product_List
{
    protected $_jsonProductCollection;

    public function getJsonProducts() {
        if ($this->_jsonProductCollection) {
            return $this->_jsonProductCollection;
        } else {
            $limit = urlencode(Mage::getStoreConfig('instantsearch/catalog/searchproductlimit'));
            $account_id = urlencode(Mage::getStoreConfig('instantsearch/catalog/searcshortdescription'));
            $feed = urlencode(Mage::getStoreConfig('instantsearch/catalog/searchdetaildescription'));
            $signature = urlencode(Mage::getStoreConfig('instantsearch/catalog/searchproducttag'));
            $searchproductlimitpage = urlencode(Mage::getStoreConfig('instantsearch/catalog/searchproductlimitpage'));
            
            if($this->getRequest()->getPost('id')!="")
            {
                $products = Mage::getModel('catalog/product')->load($this->getRequest()->getPost('id'));

                return $products;
            }

            if($this->getRequest()->get('q'))
            {
                $query = urlencode($this->getRequest()->get('q'));

                if($searchproductlimitpage > 0)
                    $url = "https://experiments.syteapi.com/search/items?q=$query&account_id=$account_id&feed=$feed&sig=$signature&limit=$searchproductlimitpage";
                else
                    $url = "https://experiments.syteapi.com/search/items?q=$query&account_id=$account_id&feed=$feed&sig=$signature";

                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL => $url,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_SSL_VERIFYHOST => false,
                    CURLOPT_SSL_VERIFYPEER => false,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET",
                    CURLOPT_HTTPHEADER => array(
                        "cache-control: no-cache"
                    ),
                ));

                $response = curl_exec($curl);
                $err = curl_error($curl);

                curl_close($curl);

                if ($err) {

                } else {

                    $this->_jsonProductCollection = json_decode($response, true);
                }
            }

            return $this->_jsonProductCollection;
        }
    }

}
