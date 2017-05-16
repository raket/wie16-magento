<?php

namespace Raket\ShippingNotice\Block;

use Magento\Framework\View\Element\Template;

class Notice extends Template {
    protected $_helper;
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        array $data = [],
        \Raket\ShippingNotice\Helper\Data $helper
    ) {
        parent::__construct($context, $data);
        $this->_helper = $helper;
    }

    public function getNotice() {
        return $this->_helper->getNotice();
    }
}