<?php

namespace Oskarlind\Tutorial\Model;
class ReviewPlugin
{
    protected $logger;
    public function __construct(\Psr\Log\LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function afterExecute(\Magento\Review\Controller\Product\Post $subject, $result) {
        $this->logger->info("A review was added! Please go to your admin page to approve or disapprove it.");
        return $result;
    }
}