<?php

require_once "Stack.php";

$firstStack = new Stack;
$firstStack->push(1);
$firstStack->push(2);
$firstStack->push(3);

echo "Top of first stack: " . $firstStack->top() . "</br>";

echo "Is stack empty? " . $firstStack->isEmpty() . "</br>";

echo "Last element poped - " . $firstStack->pop() . "</br>";

echo "Current last element: " . $firstStack->top() . "</br>";

$firstStack->pop();
$firstStack->pop();

echo "Now is empty: " . $firstStack->isEmpty() . "</br>";

$secondStack = new Stack([1,2,3]);

echo "Last element of second stack: " . $secondStack->top() . "</br>";

echo "Check stack size: " . $secondStack->size() . "</br>";


