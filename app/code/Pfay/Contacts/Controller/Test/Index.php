<?php
namespace Pfay\Contacts\Controller\Test;
class Index extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {
    	$this->_view->loadLayout();
       echo "rishikesh";

       /* Render Layout in magento pahase:1
       $this->_view->loadLayout();
        echo "first action";
        $this->_view->renderLayout();
        */
        
      /*  $contact = $this->_objectManager->create('Pfay\Contacts\Model\Contact');
        echo "<pre>";
        //Second phase Save data into Database //
        //print_r($contact);
        $contact->setName('Paul Dupond');
        $contact->save();
        //die('test');
        $contact = $this->_objectManager->create('Pfay\Contacts\Model\Contact');
        $contact->setName('Paul Dupond');
        $contact->save();*/
        /*Save bulk of data in controller using COntrollers action*/
        $contact = $this->_objectManager->create('Pfay\Contacts\Model\Contact');
        $contact->setName('Prashant');
        $contact->save();

        $contact = $this->_objectManager->create('Pfay\Contacts\Model\Contact');
        $contact->setName('Gautam');
        $contact->save();


        $contact = $this->_objectManager->create('Pfay\Contacts\Model\Contact');
        $contact->setName('first field');
        $contact->save();

        $contact = $this->_objectManager->create('Pfay\Contacts\Model\Contact');
        $contact->setName('second field');
        $contact->save();
        /**3rd block of Data*/
        $contact = $this->_objectManager->create('Pfay\Contacts\Model\Contact');
        $contact->setName('third field');
        $contact->save();
        
        $contactModel = $this->_objectManager->create('Pfay\Contacts\Model\Contact');
      //  $collection = $contactModel->getCollection()->addFieldToFilter('name', array('like'=> 'Prashant'));
        echo "<pre>";
         $collection = $contactModel->getCollection()->addFieldToFilter('name', array('like'=> 'Prashant'));
        foreach($collection as $contact) {
         // print_r($contact->getData());

          //echo $result;
        }        
          echo "filter collection using name";
          $this->_view->renderLayout();
        /*Save bulk of data in controller using COntrollers action*/
        
        
    }
}
