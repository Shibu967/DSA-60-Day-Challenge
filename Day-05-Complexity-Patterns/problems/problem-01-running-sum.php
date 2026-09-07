<?php

/**
 * Problem 01 — Running Sum of 1d Array
 *
 * Platform  : LeetCode
 * Difficulty: Easy
 * Pattern   : Single loop, in-place modification
 *
 * Problem Statement:
 * Given an array of numbers, return a new array where each element
 * is the sum of all elements from index 0 up to that position.
 *
 * Time            : O(n) — single loop, one pass through the array
 * Auxiliary Space : O(1) — no new array created, modified in-place
 */

// ─────────────────────────────────────────────────────
// My Approach (Solved Independently)
// ─────────────────────────────────────────────────────
// Start at index 1. Add the previous element to the current one.
// This builds a running total without creating any extra array.
// WHY O(n): We visit every element exactly once.
// WHY O(1) auxiliary: We modify the input array directly — no extra storage.

function runningSum(array $nums): array
{
    for ($i = 1; $i < count($nums); $i++) {
        $nums[$i] += $nums[$i - 1];   // current = current + previous
    }

    return $nums;
}

// ─────────────────────────────────────────────────────
// Test Cases
// ─────────────────────────────────────────────────────

echo "=== Problem 01: Running Sum of 1d Array ===" . PHP_EOL;
echo PHP_EOL;

// Test 1: General case
$arr1 = [1, 2, 3, 4];
echo "Input : [" . implode(', ', $arr1) . "]" . PHP_EOL;
echo "Output: [" . implode(', ', runningSum($arr1)) . "]" . PHP_EOL;   // Expected: 1, 3, 6, 10
echo PHP_EOL;

// Test 2: All ones
$arr2 = [1, 1, 1, 1, 1];
echo "Input : [" . implode(', ', $arr2) . "]" . PHP_EOL;
echo "Output: [" . implode(', ', runningSum($arr2)) . "]" . PHP_EOL;   // Expected: 1, 2, 3, 4, 5
echo PHP_EOL;

// Test 3: Mixed values
$arr3 = [3, 1, 2, 10, 1];
echo "Input : [" . implode(', ', $arr3) . "]" . PHP_EOL;
echo "Output: [" . implode(', ', runningSum($arr3)) . "]" . PHP_EOL;   // Expected: 3, 4, 6, 16, 17
echo PHP_EOL;

echo "Time Complexity      : O(n)" . PHP_EOL;
echo "Auxiliary Space      : O(1) — modified in-place, no new array" . PHP_EOL;
