<?php

namespace App\Models;

use Exception;

class ServiceBad
{

  public function fetch(): String
  {
    $logger = new Logger();
    $logger->log('omg');
  }
}
