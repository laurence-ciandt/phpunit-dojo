<?php

namespace App\Models;

use Exception;

class Employee
{
  private $employeeId;

  private $name;

  private $age;

  private $startDate;

  public function __construct(String $employeeId, String $name, int $age, ?DateTime $startDate = null)
  {
    $this->employeeId = $employeeId;
    $this->name = $name;
    $this->age = $age;
    $this->startDate = $startDate;
  }

  public function getEmployeeId(): String
  {
    return $this->employeeId;
  }

  public function getName(): String
  {
    return $this->name;
  }

  public function getAge(): int
  {
    return $this->age;
  }

  public function getStartDate(): ?DateTime
  {
    if ($this->startDate) {
      return $this->startDate;
    }

    throw new Exception('lol');
  }

  public function getAttendanceData()
  {
    $url = "http://www.dakoku-ciandt.com/json/attendance/employee/" . $this->getEmployeeId();
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $json =  curl_exec($ch);
    curl_close($ch);

    return json_decode($json);
  }
}
