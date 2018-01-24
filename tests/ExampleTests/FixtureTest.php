<?php
use PHPUnit\Framework\TestCase;

class FixtureTest extends TestCase
{
    protected $employees;

    protected function setUp()
    {
        $this->employees = json_decode(file_get_contents("fixtures/employees.json"), true);
    }

    public function testNotEmpty()
    {
        $this->assertFalse(empty($this->employees));
    }

    public function testCountEmployees()
    {
        $this->assertEquals(5, count($this->employees));
        $this->assertFalse(empty($this->employees));
    }

    public function testEmployeeKanjiDaijoubu()
    {
        $this->assertEquals('大丈夫', ($this->employees[0]['name']));
        $this->assertFalse(empty($this->employees));
    }
}
