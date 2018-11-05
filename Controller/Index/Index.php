<?php

namespace ASV\TestMI22\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{

    protected $_pageFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory)
    {
        $this->_pageFactory = $pageFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        //var_dump($this->_pageFactory->create()->getLayout()->getUpdate()->getHandles());
        //echo($this->_pageFactory->create()->getLayout()->getUpdate()->getHandles());
//        die('mm');

        return $this->_pageFactory->create();
/*
        $this->_view->loadLayout();
        $this->_view->getLayout()->initMessages();
        $this->_view->renderLayout();*/
    }
}