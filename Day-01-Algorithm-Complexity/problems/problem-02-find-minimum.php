<?php

/**
 * Problem 02 — Find Minimum in Array
 *
 * Platform  : Custom
 * Difficulty: Easy
 * Pattern   : Linear Scan
 *
 * Problem Statement:
 * Given an array of integers, find and return the minimum (smallest) value.
 *
 * Time  : O(n) — must visit every element once
 * Space : O(1) — only one extra variable ($min) used
 */

// ─────────────────────────────────────────────────────
// My Approach (Solved Independently)
// ─────────────────────────────────────────────────────
// Mirror of findMax — start by assuming the first element is the minimum.
// Walk through every element. If a smaller value is found, update $min.
// WHY O(n): Same reason — the smallest value could be at any position.

function findMin(array $arr): int|float
{
    $min = $arr[0]; // Assume first element is the min

    foreach ($arr as $value) {
        if ($value < $min) {
            $min = $value; // Found a new minimum
        }
    }

    return $min;
}

// ─────────────────────────────────────────────────────
// Test Cases
// ─────────────────────────────────────────────────────

echo "=== Problem 02: Find Minimum in Array ===" . PHP_EOL;
echo PHP_EOL;

// Test 1: General case
$arr1 = [3, 7, 1, 9, 4, 2, 8];
echo "Input : [" . implode(', ', $arr1) . "]" . PHP_EOL;
echo "Output: " . findMin($arr1) . PHP_EOL; // Expected: 1
echo PHP_EOL;

// Test 2: Min at the end
$arr2 = [5, 4, 3, 2, 1];
echo "Input : [" . implode(', ', $arr2) . "]" . PHP_EOL;
echo "Output: " . findMin($arr2) . PHP_EOL; // Expected: 1
echo PHP_EOL;

// Test 3: Min at the beginning
$arr3 = [1, 10, 20, 99];
echo "Input : [" . implode(', ', $arr3) . "]" . PHP_EOL;
echo "Output: " . findMin($arr3) . PHP_EOL; // Expected: 1
echo PHP_EOL;

// Test 4: All same values
$arr4 = [7, 7, 7, 7];
echo "Input : [" . implode(', ', $arr4) . "]" . PHP_EOL;
echo "Output: " . findMin($arr4) . PHP_EOL; // Expected: 7
echo PHP_EOL;

// Test 5: Negative numbers
$arr5 = [3, -5, 10, -1, 0];
echo "Input : [" . implode(', ', $arr5) . "]" . PHP_EOL;
echo "Output: " . findMin($arr5) . PHP_EOL; // Expected: -5
