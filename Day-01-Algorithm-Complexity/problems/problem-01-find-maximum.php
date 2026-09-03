<?php

/**
 * Problem 01 — Find Maximum in Array
 *
 * Platform  : Custom
 * Difficulty: Easy
 * Pattern   : Linear Scan
 *
 * Problem Statement:
 * Given an array of integers, find and return the maximum (largest) value.
 *
 * Time  : O(n) — must visit every element once
 * Space : O(1) — only one extra variable ($max) used
 */

// ─────────────────────────────────────────────────────
// My Approach (Solved Independently)
// ─────────────────────────────────────────────────────
// Start by assuming the first element is the maximum.
// Then walk through every element. If a larger value is found,
// update $max. After the full loop, $max holds the answer.
// WHY O(n): We cannot skip any element — the largest could be anywhere.

function findMax(array $arr): int|float
{
    $max = $arr[0]; // Assume first element is the max

    foreach ($arr as $value) {
        if ($value > $max) {
            $max = $value; // Found a new maximum
        }
    }

    return $max;
}

// ─────────────────────────────────────────────────────
// Test Cases
// ─────────────────────────────────────────────────────

echo "=== Problem 01: Find Maximum in Array ===" . PHP_EOL;
echo PHP_EOL;

// Test 1: General case
$arr1 = [3, 7, 1, 9, 4, 2, 8];
echo "Input : [" . implode(', ', $arr1) . "]" . PHP_EOL;
echo "Output: " . findMax($arr1) . PHP_EOL; // Expected: 9
echo PHP_EOL;

// Test 2: Already sorted (max at end)
$arr2 = [1, 2, 3, 4, 5];
echo "Input : [" . implode(', ', $arr2) . "]" . PHP_EOL;
echo "Output: " . findMax($arr2) . PHP_EOL; // Expected: 5
echo PHP_EOL;

// Test 3: Max at the beginning
$arr3 = [99, 10, 20, 5];
echo "Input : [" . implode(', ', $arr3) . "]" . PHP_EOL;
echo "Output: " . findMax($arr3) . PHP_EOL; // Expected: 99
echo PHP_EOL;

// Test 4: All same values
$arr4 = [4, 4, 4, 4];
echo "Input : [" . implode(', ', $arr4) . "]" . PHP_EOL;
echo "Output: " . findMax($arr4) . PHP_EOL; // Expected: 4
echo PHP_EOL;

// Test 5: Single element
$arr5 = [42];
echo "Input : [" . implode(', ', $arr5) . "]" . PHP_EOL;
echo "Output: " . findMax($arr5) . PHP_EOL; // Expected: 42
