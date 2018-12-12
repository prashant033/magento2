<?php
namespace Pfay\Contacts\Controller\Test;

use Magento\Framework\App\Action\Action;

class Myevent extends Action
{
    public function execute()
    {

        $this->_eventManager->dispatch('pfay_contacts_event_test');
        //pfay_contacts_event_test is the name of this event
        //disptach is the method which will process that event method
        die('set custom events');
    }
}