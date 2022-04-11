<?php

class Stack
{
    private int $pointer;

    public function __construct(private array $stack = [])
    {
        $this->pointer = count($stack);
    }

    public function push(mixed $element): bool
    {
        $this->stack[$this->pointer++] = $element;
        return true;
    }

    public function pop(): mixed
    {
        if($this->isEmpty()){
            throw new Exception('Can not pop element from empty stack');
        }
        $this->pointer--;
        return $this->stack[$this->pointer];
    }

    public function top(): mixed
    {
        if($this->isEmpty()){
            throw new Exception('Can not return top of empty stack');
        }
        return $this->stack[$this->pointer - 1];
    }

    public function isEmpty(): bool
    {
        return $this->pointer === 0;
    }

    public function size(): int
    {
        return $this->pointer;
    }
}