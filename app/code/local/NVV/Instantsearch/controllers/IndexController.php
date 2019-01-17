<?php
class NVV_Instantsearch_IndexController extends Mage_Core_Controller_Front_Action{
    public function IndexAction() {
      //setting the template.
    	if($this->getRequest()->getPost('q')!="" OR $this->getRequest()->getPost('id')!=""){
    		//if the query is not null then set the layout 
	 		echo $this->getLayout()->createBlock('instantsearch/index')->setTemplate('instantsearch/view.phtml')->toHtml();
    	}
	  	
    }
}