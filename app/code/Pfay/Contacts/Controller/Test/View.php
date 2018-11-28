<?php
namespace Pfay\Contacts\Controller\Test;
class View extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {
    	$this->_view->loadLayout();
    	echo "view action";
    	echo "<br/>";
       // die('Third Controller actions');
        $this->_view->renderLayout();
    }
}
