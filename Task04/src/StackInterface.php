<?php

namespace App;

interface StackInterface
{
    public function push(mixed ...$elements): void;

    public function pop(): mixed;

    public function top(): mixed;

    public function isEmpty(): bool;

    public function copy(): \App\Stack;

    public function __toString(): string;
}
