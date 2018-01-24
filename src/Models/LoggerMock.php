<?php

namespace App\Models;

use Exception;

class LoggerMock
{

  protected $message;

  public function log($message): String
  {
    // OK lets override this and make testing easy
    $this->message = $message;
  }

  public function getMessage()
  {
    return $this->message;
  }
}
