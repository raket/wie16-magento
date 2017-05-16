<?php

namespace Raket\Helloworld\Controller\Hello;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class World extends \Magento\Framework\App\Action\Action
{

    protected $pageFactory;
    // There is only *one* entry point per controller, and that's "execute"!

    public function __construct(Context $context, PageFactory $pageFactory)
    {
        $this->pageFactory = $pageFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        //var_dump(__METHOD__);
        $page_object = $this->pageFactory->create();
        return $page_object;
    }
}