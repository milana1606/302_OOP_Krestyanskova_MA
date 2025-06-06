<?php

declare(strict_types=1);


use Task02\Vector;

function runTest(): void
{
    echo "Тест символьного представления вектора:" . PHP_EOL;
    $v1 = new Vector(1, 2, 3);
    echo "Ожидается: (1; 2; 3)" . PHP_EOL;
    echo "Получено: " . $v1 . PHP_EOL;
    echo PHP_EOL;

    echo "Тест сложения векторов:" . PHP_EOL;
    $v2 = new Vector(1, 4, -2);
    $v3 = $v1->add($v2);
    echo "Ожидается: (2; 6; 1)" . PHP_EOL;
    echo "Получено: " . $v3 . PHP_EOL;
    echo PHP_EOL;

    echo "Тест вычитания векторов:" . PHP_EOL;
    $v4 = $v1->sub($v2);
    echo "Ожидается: (0; -2; 5)" . PHP_EOL;
    echo "Получено: " . $v4 . PHP_EOL;
    echo PHP_EOL;

    echo "Тест умножения вектора на число:" . PHP_EOL;
    $v5 = $v1->product(3);
    echo "Ожидается: (3; 6; 9)" . PHP_EOL;
    echo "Получено: " . $v5 . PHP_EOL;
    echo PHP_EOL;

    echo "Тест скалярного произведения:" . PHP_EOL;
    $scalar = $v1->scalarProduct($v2);
    // Вычисление: 1*1 + 2*4 + 3*(-2) = 1 + 8 - 6 = 3
    echo "Ожидается: 3" . PHP_EOL;
    echo "Получено: " . $scalar . PHP_EOL;
    echo PHP_EOL;

    echo "Тест векторного произведения:" . PHP_EOL;
    $v6 = $v1->vectorProduct($v2);
    // Вычисление: (2*(-2) - 3*4, 3*1 - 1*(-2), 1*4 - 2*1) = (-4 -12, 3+2, 4-2) = (-16; 5; 2)
    echo "Ожидается: (-16; 5; 2)" . PHP_EOL;
    echo "Получено: " . $v6 . PHP_EOL;
    echo PHP_EOL;
}
