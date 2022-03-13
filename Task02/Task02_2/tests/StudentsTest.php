<?php

declare(strict_types=1);

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Student;

final class StudentTest extends TestCase
{
    public function testGetters(): void
    {
        // arrange
        $student1 = Student::create();
        $student2 = Student::create();
        $student3 = Student::create();

        // act
        $student3->setFirstName("Иван")->setSecondName("Иванов")->setFaculty("ФМИТ")->setCourse(1)->setGroup(102)->__toString();

        // assert
        $this->assertSame(3, $student3->getId());
        $this->assertSame("Иван", $student3->getFirstName());
        $this->assertSame("Иванов", $student3->getSecondName());
        $this->assertSame("ФМИТ", $student3->getFaculty());
        $this->assertSame(1, $student3->getCourse());
        $this->assertSame(102, $student3->getGroup());
    }
}
