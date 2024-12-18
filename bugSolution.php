function foo(array $arr): array {
  return array_filter($arr, function($value) { return $value !== 'bar';});
}

$arr = ['a' => 'foo', 'b' => 'bar', 'c' => 'baz'];
$result = foo($arr);
print_r($result); // Output: Array ( [a] => foo [c] => baz )

//This solution correctly removes elements with value 'bar' from both indexed and associative arrays.