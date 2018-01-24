<?php

namespace Tests\ExampleTests;

use App\Models\Employee;
use PHPUnit\Framework\TestCase;

class EmployeeTest extends TestCase
{
  protected $employee;

  public function setUp()
  {
    $this->employee = new Employee('42ab', 'Felipe', 29);
  }

  public function tearDown()
  {
    unset($this->employee);
  }

  public function testGetEmployeeId()
  {
    $this->assertEquals('42ab', $this->employee->getEmployeeId());
    $this->assertTrue(is_string($this->employee->getEmployeeId()));
  }

  public function testGetName()
  {
    $this->assertEquals('Felipe', $this->employee->getName());
    $this->assertTrue(is_string($this->employee->getName()));
  }

  public function testGetAge()
  {
    $this->assertEquals(29, $this->employee->getAge());
    $this->assertTrue(is_int($this->employee->getAge()));
  }

  /**
  * Test the getStartDate function to see what happens
  * when no startDate is passed as a parameter into the constructor
  * @expectedException Exception
  */
  public function testGetStartDateNoStartDate()
  {
    $this->employee->getStartDate();
  }

  public function testEmployeeAttendanceJsonResponse()
  {
        $stub = $this->createMock(Employee::class);

        // Configure the stub.
        $stub->method('getAttendanceData')
             ->willReturn((object) ['id' => '42ab', 'unauthorized_absences' => 0]);

        $data = $stub->getAttendanceData();

        $this->assertEquals(0, $data->unauthorized_absences);
  }
}
