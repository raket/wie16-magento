<?php
namespace Raket\ShippingNotice\Helper;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{

    protected $_scopeConfig;
    CONST ENABLE = 'amasty_helloworld/general/enable';
    CONST BLOCK_LABEL = 'amasty_helloworld/general/block_label';
    CONST TEXT_ALIGN = 'amasty_helloworld/general/text_align';

    public function __construct(\Magento\Framework\App\Helper\Context $context,
                                \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig)
    {
        parent::__construct($context);
        $this->_scopeConfig = $scopeConfig;
    }

    public function getEnable()
    {
        return $this->_scopeConfig->getValue('raket_shippingnotice/general/enable');
    }

    public function getOutputText(){
        return $this->_scopeConfig->getValue('raket_shippingnotice/general/output_text');
    }

    public function getHoursRemaining() {
        $midnight = strtotime("tomorrow 00:00:00");
        return floor(($midnight - time()) / 3600);
    }

    public function getNotice() {
        if($this->getEnable()) {
            return $this->getOutputText() . $this->getHoursRemaining();
        }
        return "";
    }
}