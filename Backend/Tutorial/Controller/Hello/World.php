<?php

namespace Oskarlind\Tutorial\Controller\Hello;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class World extends \Magento\Framework\App\Action\Action
{
    /*public function execute()
    {
        echo "Hello world!";
    }*/
    protected $pageFactory;
    public function __construct(Context $context, PageFactory $pageFactory)
    {
        $this->pageFactory = $pageFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        $page_object = $this->pageFactory->create();;
        return $page_object;
    }
}
