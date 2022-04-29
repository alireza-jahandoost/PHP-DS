<?php

class SparseTable
{
  private array $array = [];
  private array $lg = [];
  private mixed $callback;
  private int $K;
  private int $N;

  public function __construct(array $initialArray, mixed $callback)
  {
    $this->callback = $callback;
    $this->N = count($initialArray);
    $this->K = floor($this->log2($this->N));
    for ($i = 0; $i <= $this->N; $i++) {
      $this->array[$i] = [];
    }

    for ($i = 0; $i < $this->N; $i++) {
      $this->array[$i][0] = $initialArray[$i];
    }

    for ($j = 1; $j <= $this->K; $j++) {
      for ($i = 0; $i + (1 << $j) <= $this->N; $i++) {
        $this->array[$i][$j] = $this->callback($this->array[$i][$j - 1], $this->array[$i + (1 << ($j - 1))][$j - 1]);
      }
    }

    $this->lg[1] = 0;
    for ($i = 2; $i <= $this->N; $i++) {
      $this->lg[$i] = $this->lg[floor($i / 2)] + 1;
    }
  }

  private function log2(int $x): float|int
  {
    return (log10($x) / log10(2));
  }

  public function callback(...$args): mixed
  {
    $cb = $this->callback;
    return $cb(...$args);
  }

  public function idempotent(int $start, int $end): int|float
  {
    $j = $this->lg[$end - $start + 1];
    return $this->callback($this->array[$start][$j], $this->array[$end - (1 << $j) + 1][$j]);
  }

  public function noneIdempotent($start, $end, $initialValue = 0): int|float
  {
    $ans = $initialValue;
    for ($j = $this->K; $j >= 0; $j--) {
      if ((1 << $j) <= $end - $start + 1) {
        $ans = $this->callback($ans, $this->array[$start][$j]);
        $start += (1 << $j);
      }
    }
    return $ans;
  }
}