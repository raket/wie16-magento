<?php

namespace Raket\Helloworld\Block;

use Magento\Framework\View\Element\Template;

class Main extends Template {
    protected function _prepareLayout()
    {
        //die();
        $this->setMessage('Hello from Raket');
    }
}