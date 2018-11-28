<?php
namespace Pfay\Contacts\Block;
use Magento\Framework\View\Element\Template;
class Hello extends Template
{
   public function __construct(\Magento\Framework\View\Element\Template\Context $context)
    {
        parent::__construct($context);
    }
 /* public function __construct(Template\Context $context, array $data = [])
    {
        parent::__construct($context, $data);
        $this->_isScopePrivate = true;
    }*/
    public function sayHello()
    {
        return __('Hello World');
    }

    public function getPostCollection(){
      //  echo "git push";
        $post = $this->_postFactory->create();
        return $post->getCollection();
    }
}