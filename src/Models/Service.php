<?php

namespace App\Models;

use Exception;

class Service
{
  private $logger;

  public function __construct(Logger $logger)
  {
    $this->logger = $logger;
  }

  public function fetch(): String
  {
    // Fetch data and log
    $this->logger->log('omg');
  }
}
