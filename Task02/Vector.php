<?php

declare(strict_types=1);

namespace Task02;

class Vector
{
    private float $x;
    private float $y;
    private float $z;

    public function __construct($x, $y, $z)
    {
        if (!is_numeric($x) || !is_numeric($y) || !is_numeric($z)) {
            throw new \InvalidArgumentException('Все координаты должны быть числовыми значениями.');
        }
        $this->x = (float) $x;
        $this->y = (float) $y;
        $this->z = (float) $z;
    }

    public function add(Vector $vector): Vector
    {
        return new self(
            $this->x + $vector->x,
            $this->y + $vector->y,
            $this->z + $vector->z
        );
    }

    public function sub(Vector $vector): Vector
    {
        return new self(
            $this->x - $vector->x,
            $this->y - $vector->y,
            $this->z - $vector->z
        );
    }

    public function product($number): Vector
    {
        if (!is_numeric($number)) {
            throw new \InvalidArgumentException('Множитель должен быть числом.');
        }
        return new self(
            $this->x * $number,
            $this->y * $number,
            $this->z * $number
        );
    }

    public function scalarProduct(Vector $vector): float
    {
        return $this->x * $vector->x +
               $this->y * $vector->y +
               $this->z * $vector->z;
    }

    public function vectorProduct(Vector $vector): Vector
    {
        return new self(
            $this->y * $vector->z - $this->z * $vector->y,
            $this->z * $vector->x - $this->x * $vector->z,
            $this->x * $vector->y - $this->y * $vector->x
        );
    }

    public function __toString(): string
    {
        return sprintf('(%s; %s; %s)', $this->x, $this->y, $this->z);
    }
}
