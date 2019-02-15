<?php
namespace Pfay\Contacts\Block;
use Magento\Framework\View\Element\Template;
class View extends Template
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
    public function ViewAction()
    {
        return __('Render View Action');
    }

    public function getPostCollection(){
        $post = $this->_postFactory->create();
        return $post->getCollection();
    }

    public function getImageUrl(){

        $url = $this->getViewFileUrl('Pfay_Contacts::images/juul-pods_limited_edition.jpg');
        return $url;
    }
}