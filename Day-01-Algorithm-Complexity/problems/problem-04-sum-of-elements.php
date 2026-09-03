<?php

/**
 * Problem 04 — Sum of All Elements
 *
 * Platform  : Custom
 * Difficulty: Easy
 * Pattern   : Linear Scan
 *
 * Problem Statement:
 * Given an array of integers, return the sum of all its elements.
 *
 * Time  : O(n) — must visit every element once to add it
 * Space : O(1) — only one extra variable ($sum) used
 */

// ─────────────────────────────────────────────────────
// My Approach (Solved Independently)
// ─────────────────────────────────────────────────────
// Start with $sum = 0.
// Walk through every element and keep adding it to $sum.
// WHY O(n): We must touch every element — no shortcut exists.
// WHY O(1) space: We only use one variable regardless of array size.

function sumOfElements(array $arr): int|float
{
    $sum = 0;

    foreach ($arr as $val) {
        $sum += $val; // same as: $sum = $sum + $val
    }

    return $sum;
}

// ─────────────────────────────────────────────────────
// Test Cases
// ─────────────────────────────────────────────────────

echo "=== Problem 04: Sum of All Elements ===" . PHP_EOL;
echo PHP_EOL;

// Test 1: General case
$arr1 = [1, 2, 3, 4, 5];
echo "Input : [" . implode(', ', $arr1) . "]" . PHP_EOL;
echo "Output: " . sumOfElements($arr1) . PHP_EOL; // Expected: 15
echo PHP_EOL;

// Test 2: All zeros
$arr2 = [0, 0, 0, 0];
echo "Input : [" . implode(', ', $arr2) . "]" . PHP_EOL;
echo "Output: " . sumOfElements($arr2) . PHP_EOL; // Expected: 0
echo PHP_EOL;

// Test 3: Including negative numbers
$arr3 = [3, -2, 7, -1, 5];
echo "Input : [" . implode(', ', $arr3) . "]" . PHP_EOL;
echo "Output: " . sumOfElements($arr3) . PHP_EOL; // Expected: 12
echo PHP_EOL;

// Test 4: Single element
$arr4 = [42];
echo "Input : [" . implode(', ', $arr4) . "]" . PHP_EOL;
echo "Output: " . sumOfElements($arr4) . PHP_EOL; // Expected: 42
echo PHP_EOL;

// Test 5: Large numbers
$arr5 = [100, 200, 300, 400, 500];
echo "Input : [" . implode(', ', $arr5) . "]" . PHP_EOL;
echo "Output: " . sumOfElements($arr5) . PHP_EOL; // Expected: 1500
