<?php

namespace App;

class Stack implements StackInterface
{
    private array $elements = [];

    public function __construct(mixed ...$elements)
    {
        if (!empty($elements)) {
            foreach ($elements as $element) {
                $this->elements[] = $element;
            }
        }
    }

    public function push(mixed ...$elements): void
    {
        foreach ($elements as $element) {
            array_unshift($this->elements, $element);
        }
    }

    public function pop(): mixed
    {
        if ($this->isEmpty()) {
            return null;
        }

        return array_shift($this->elements);
    }

    public function top(): mixed
    {
        if ($this->isEmpty()) {
            return null;
        }

        return $this->elements[0];
    }

    public function isEmpty(): bool
    {
        return empty($this->elements);
    }

    public function copy(): \App\Stack
    {
        $copy = new Stack();
        $reversedElements = array_reverse($this->elements);
        $copy->push(...$reversedElements);
        return $copy;
    }

    public function __toString(): string
    {
        if ($this->isEmpty()) {
            return '[]';
        }

        return '[' . implode('->', $this->elements) . ']';
    }
}


