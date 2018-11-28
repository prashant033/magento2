<?php
namespace Pfay\Contacts\Controller\Test;
class Save extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {
    	$this->_view->loadLayout();
    	echo "second action";
    	echo "<br/>";
        //die('Third action in controolers');
        $this->_view->RenderLayout();
    }
}
