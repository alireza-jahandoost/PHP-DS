<?php
require_once('../Stack/Stack.php');

class MinimumStack
{
    private Stack $stack;

    public function __construct(){
        $this->stack = new Stack();
    }

    public function push(mixed $newValue):void
    {
        $min = $this->stack->isEmpty() ? $newValue : min($newValue, $this->stack->top()[1]);
        $this->stack->push([$newValue, $min]);
    }

    public function pop():mixed
    {
        return $this->stack->pop()[0];
    }

    public function top():mixed
    {
        return $this->stack->top()[0];
    }

    public function minimum():mixed
    {
        return $this->stack->top()[1];
    }

    public function isEmpty():int
    {
        return $this->stack->isEmpty();
    }

    public function size():int
    {
        return $this->stack->size();
    }
}