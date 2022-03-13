<?php

declare(strict_types=1);

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use Exception;
use App\Fraction;

final class FractionTest extends TestCase
{
    public function testCreateWithAllPositiveArgs(): void
    {
        // act
        $frac1 = Fraction::create(30, 105);
        $frac2 = Fraction::create(150, 70);

        //assert
        $this->assertEquals("2/7", $frac1->__toString());
        $this->assertEquals("2'1/7", $frac2->__toString());
    }

    public function testCreateWithOnePositiveArg(): void
    {
        // act
        $frac1 = Fraction::create(30, -105);
        $frac2 = Fraction::create(-30, 105);

        // assert
        $this->assertEquals("-2/7", $frac1->__toString());
        $this->assertEquals("--2/7", $frac2->__toString());
    }

    public function testCreateWithAllNegativeArgs(): void
    {
        // act
        $frac = Fraction::create(-30, -105);

        // assert
        $this->assertEquals("2/7", $frac->__toString());
    }

    public function testCreateWithDivisibleArguments(): void
    {
        // act
        $frac1 = Fraction::create(15, 3);
        $frac2 = Fraction::create(5, 5);

        //assert
        $this->assertEquals("5", $frac1->__toString());
        $this->assertEquals("1", $frac2->__toString());
    }

    public function testCreateWithZeroNumerator(): void
    {
        // act
        $frac = Fraction::create(0, -10);

        //assert
        $this->assertEquals("0", $frac->__toString());
    }

    public function testCreateWithZeroDenominator(): void
    {
        // assert
        $this->expectException(Exception::class);
        $this->expectErrorMessage("denominator can't be 0");

        // act
        Fraction::create(100, 0);
    }

    public function testGetNumerator(): void
    {
        // arrange
        $frac = Fraction::create(600, 1000);

        // act
        $numer = $frac->getNumer();

        // assert
        $this->assertSame(3, $numer);
    }

    public function testGetDenominator(): void
    {
        // arrange
        $frac = Fraction::create(600, 1000);

        // act
        $denom = $frac->getDenom();

        // assert
        $this->assertSame(5, $denom);
    }

    public function testAdd(): void
    {
        // arrange
        $frac1 = Fraction::create(30, 105);
        $frac2 = Fraction::create(105, 30);

        // act
        $actualResult = $frac1->add($frac2);

        // assert
        $expectedResult = Fraction::create(53, 14);
        $this->assertEquals($expectedResult, $actualResult);
    }

    public function testSub(): void
    {
        // arrange
        $frac1 = Fraction::create(30, 105);
        $frac2 = Fraction::create(105, 30);

        // act
        $actualResult = $frac1->sub($frac2);

        // assert
        $expectedResult = Fraction::create(-45, 14);
        $this->assertEquals($expectedResult, $actualResult);
    }
}
