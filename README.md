# PHP: Unexpected unset() Behavior in foreach Loop with Associative Arrays

This repository demonstrates a common but subtle bug in PHP related to the `unset()` function when used within a `foreach` loop iterating over an associative array.  Attempting to remove elements by value directly within the loop often produces unexpected results.

The `bug.php` file contains the buggy code, which incorrectly removes elements from an associative array. The `bugSolution.php` file shows the correct approach using `array_filter()`.

## Bug Explanation

When `unset()` is used inside a `foreach` loop on an associative array and the array key is modified the array index will be shift. That is not the case in a numeric array as index are sequential.  Therefore, this will leads to an incorrect result. 

## Solution

The recommended solution utilizes the `array_filter()` function, which provides a more robust way to remove elements from an array based on their values, regardless of the array type.