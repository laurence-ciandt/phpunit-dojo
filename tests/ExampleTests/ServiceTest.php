<?php
use PHPUnit\Framework\TestCase;

class ServiceTest extends TestCase
{
    public function testLogCustomMock()
    {
      $logger = new LoggerMock(); // implements same methods as Logger but overides methods
      $service = new Service($logger);

      $service->fetch();

      $this->assertEquals('omg', $logger->getMessage());
    }

    public function testLogCoolMock()
    {
    $logger = $this->getMockBuilder(Logger::class)
                       ->setMethods(['log'])
                       ->getMock();

     $logger->expects($this->once())
              ->method('log')
              ->with($this->equalTo('omg'));

      $service = new Service($logger);
      $service->fetch();
    }
}
