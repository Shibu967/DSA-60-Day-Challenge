<?php

/**
 * Day 08 — Arrays: Fundamentals
 * Problem 05 — Rotate Array to the Right by K Positions
 *
 * Task: Rotate an array to the right by k steps, where k is non-negative.
 *
 * Pattern: Reverse Trick
 *
 * Time: O(n) — array is reversed 3 times
 * Space: O(1) — in-place rotation
 *
 * Important Learning:
 * - k = k % n
 * - Rotate ≠ Reverse
 */

function reversePart(array &$arr, int $left, int $right): void
{
    while ($left < $right) {
        $temp = $arr[$left];
        $arr[$left] = $arr[$right];
        $arr[$right] = $temp;

        $left++;
        $right--;
    }
}

function rotateRight(array &$arr, int $k): void
{
    $n = count($arr);

    if ($n === 0) {
        return;
    }

    // Handle case where k is greater than array length
    $k = $k % $n;

    if ($k === 0) {
        return;
    }

    // Step 1: Reverse the entire array
    reversePart($arr, 0, $n - 1);

    // Step 2: Reverse the first k elements
    reversePart($arr, 0, $k - 1);

    // Step 3: Reverse the remaining elements
    reversePart($arr, $k, $n - 1);
}

// ==========================================
// Test Cases
// ==========================================

// Test Case 1: Standard rotation
$numbers1 = [1, 2, 3, 4, 5];
rotateRight($numbers1, 2);
echo "Test Case 1: " . implode(", ", $numbers1) . PHP_EOL;
// Expected: 4, 5, 1, 2, 3

// Test Case 2: K Greater Than N (7 % 5 = 2)
$numbers2 = [1, 2, 3, 4, 5];
rotateRight($numbers2, 7);
echo "Test Case 2: " . implode(", ", $numbers2) . PHP_EOL;
// Expected: 4, 5, 1, 2, 3

// Test Case 3: K Equals N (5 % 5 = 0)
$numbers3 = [1, 2, 3, 4, 5];
rotateRight($numbers3, 5);
echo "Test Case 3: " . implode(", ", $numbers3) . PHP_EOL;
// Expected: 1, 2, 3, 4, 5

// Test Case 4: Empty Array
$numbers4 = [];
rotateRight($numbers4, 3);
echo "Test Case 4: " . implode(", ", $numbers4) . PHP_EOL;
// Expected: (Empty output)
