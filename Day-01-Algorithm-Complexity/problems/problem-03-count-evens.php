<?php

/**
 * Problem 03 — Count Even Numbers in Array
 *
 * Platform  : Custom
 * Difficulty: Easy
 * Pattern   : Linear Scan
 *
 * Problem Statement:
 * Given an array of integers, count and return how many of them are even.
 * An even number is any integer divisible by 2 (remainder = 0).
 *
 * Time  : O(n) — must visit every element once
 * Space : O(1) — only one counter variable ($count) used
 */

// ─────────────────────────────────────────────────────
// My Approach (Solved Independently)
// ─────────────────────────────────────────────────────
// Walk through every element and use the modulo operator (%).
// If $value % 2 === 0, the number is even — increment counter.
// Return the counter at the end.
// WHY O(n): Must check every element; no way to skip any.

function countEvens(array $arr): int
{
    $count = 0;

    foreach ($arr as $value) {
        if ($value % 2 === 0) { // Modulo 2 equals 0 → even number
            $count++;
        }
    }

    return $count;
}

// ─────────────────────────────────────────────────────
// Test Cases
// ─────────────────────────────────────────────────────

echo "=== Problem 03: Count Even Numbers ===" . PHP_EOL;
echo PHP_EOL;

// Test 1: Mixed array
$arr1 = [3, 7, 1, 9, 4, 2, 8];
echo "Input : [" . implode(', ', $arr1) . "]" . PHP_EOL;
echo "Output: " . countEvens($arr1) . " even(s)" . PHP_EOL; // Expected: 3
echo PHP_EOL;

// Test 2: All evens
$arr2 = [2, 4, 6, 8, 10];
echo "Input : [" . implode(', ', $arr2) . "]" . PHP_EOL;
echo "Output: " . countEvens($arr2) . " even(s)" . PHP_EOL; // Expected: 5
echo PHP_EOL;

// Test 3: No evens
$arr3 = [1, 3, 5, 7, 9];
echo "Input : [" . implode(', ', $arr3) . "]" . PHP_EOL;
echo "Output: " . countEvens($arr3) . " even(s)" . PHP_EOL; // Expected: 0
echo PHP_EOL;

// Test 4: Including negative even numbers
$arr4 = [-4, -3, 0, 5, 6];
echo "Input : [" . implode(', ', $arr4) . "]" . PHP_EOL;
echo "Output: " . countEvens($arr4) . " even(s)" . PHP_EOL; // Expected: 3 (-4, 0, 6)
echo PHP_EOL;

// Test 5: Single element (even)
$arr5 = [8];
echo "Input : [" . implode(', ', $arr5) . "]" . PHP_EOL;
echo "Output: " . countEvens($arr5) . " even(s)" . PHP_EOL; // Expected: 1
