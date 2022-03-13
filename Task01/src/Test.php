<?php

namespace App\Test;

use App\Fraction;
use Exception;

function runTest()
{
    $m1 = Fraction::create(30, 105);
    echo "Actual result: " . $m1 . "\n";
    echo "Expected result: 2/7\n\n";

    $m1_1 = Fraction::create(30, -105);
    echo "Actual result: " . $m1_1 . "\n";
    echo "Expected result: -2/7\n\n";

    $m1_2 = Fraction::create(-30, 105);
    echo "Actual result: " . $m1_2 . "\n";
    echo "Expected result: -2/7\n\n";

    $m1_3 = Fraction::create(-30, -105);
    echo "Actual result: " . $m1_3 . "\n";
    echo "Expected result: 2/7\n\n";

    $m1_4 = Fraction::create(0, -10);
    echo "Actual result: " . $m1_4 . "\n";
    echo "Expected result: 0\n\n";

    $m1_5 = Fraction::create(15, 3);
    echo "Actual result: " . $m1_5 . "\n";
    echo "Expected result: 5\n\n";

    $m2 = Fraction::create(150, 70);
    echo "Actual result: " . $m2 . "\n";
    echo "Expected result: 2'1/7\n\n";

    try {
        $m2_1 = Fraction::create(100, 0);
    } catch (Exception $e) {
        echo "Actual result: " . $e->getMessage() . "\n";
        echo "Expected result: denominator can't be 0\n\n";
    }

    $m3 = Fraction::create(600, 1000);
    echo "Actual result: " . $m3->getNumer() . "/" . $m3->getDenom() . "\n";
    echo "Expected result: 3/5\n\n";

    $m4 = $m1->add($m2);
    echo "Actual result: " . $m4 . "\n";
    echo "Expected result: 2'3/7\n\n";

    $m6 = $m4->sub($m1);
    echo "Actual result: " . $m6 . "\n";
    echo "Expected result: " . $m2 . "\n\n";
}
