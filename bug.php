function foo(array $arr): array {
  foreach ($arr as $key => $value) {
    if ($value === 'bar') {
      unset($arr[$key]);
    }
  }
  return $arr;
}

$arr = ['foo', 'bar', 'baz'];
$result = foo($arr);
print_r($result); // Output: Array ( [0] => foo [2] => baz )

// The problem is that this code only works correctly if the input array is indexed numerically from 0.
// If $arr is an associative array, unset() will only remove the element by key, not value. 
// For example:

$arr = ['a' => 'foo', 'b' => 'bar', 'c' => 'baz'];
$result = foo($arr);
print_r($result); // Output: Array ( [a] => foo [c] => baz ) 
//Notice 'bar' is removed from the original array but it will not work if we use a simple for loop or foreach loop with key as below:

function foo(array $arr): array {
  for ($i = 0; $i < count($arr); $i++) {
    if ($arr[$i] === 'bar') {
      unset($arr[$i]);
    }
  }
  return $arr;
}

$arr = ['a' => 'foo', 'b' => 'bar', 'c' => 'baz'];
$result = foo($arr);
print_r($result); // Output: Array ( [a] => foo [c] => baz ) 

//The correct way to remove elements by value from an associative array is to use array_filter().

function foo(array $arr): array {
  return array_filter($arr, function($value) { return $value !== 'bar';});
}

$arr = ['a' => 'foo', 'b' => 'bar', 'c' => 'baz'];
$result = foo($arr);
print_r($result); // Output: Array ( [a] => foo [c] => baz )