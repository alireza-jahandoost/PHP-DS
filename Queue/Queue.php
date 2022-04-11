<?php

class Queue
{
    private int $rear = 0;
    private int $front = 0;
    private array $queue = [];

    public function push(mixed $element): void{
        $this->queue[$this->front++] = $element;
    }

    public function pop(): mixed{
        if($this->isEmpty()){
            throw new Exception('can not pop from empty queue');
        }
        return $this->queue[$this->rear++];
    }

    public function front(): mixed{
        if($this->isEmpty()){
            throw new Exception('can not return the front of empty queue');
        }
        return $this->queue[$this->rear];
    }

    public function size(): int{
        return $this->front - $this->rear;
    }

    public function isEmpty(): bool{
        return $this->front === $this->rear;
    }

}