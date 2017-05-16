<?php

namespace Raket\Tutorial\Block;
use Magento\Framework\View\Element\Template;

class Main extends Template
{
    protected function _prepareLayout()
    {

    }

    public function getMessage() {
        return "Hello from block class";
    }

}