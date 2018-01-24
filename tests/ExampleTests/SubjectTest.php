<?php
use PHPUnit\Framework\TestCase;

use App\Models\Subject;
use App\Models\Observer;

class SubjectTest extends TestCase
{
    public function testObserversAreUpdated()
    {

        $observer = $this->getMockBuilder(Observer::class)
                         ->setMethods(['update'])
                         ->getMock();

        $observer->expects($this->once())
                 ->method('update')
                 ->with($this->equalTo('something'));

        $subject = new Subject('My subject');
        $subject->attach($observer);

        $subject->doSomething();
    }
}
