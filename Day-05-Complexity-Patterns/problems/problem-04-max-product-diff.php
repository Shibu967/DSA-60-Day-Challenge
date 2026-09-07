<?php

/**
 * Problem 04 — Maximum Product Difference Between Two Pairs
 *
 * Platform  : LeetCode
 * Difficulty: Easy
 * Pattern   : Sort first, then access known index positions
 *
 * Problem Statement:
 * Choose four different indices (w, x, y, z) from the array.
 * Maximize: (nums[w] × nums[x]) - (nums[y] × nums[z])
 *
 * Key insight: Maximize = multiply the two largest. Minimize = multiply the two smallest.
 * Sort the array → these values are always at known positions.
 *
 * Time  : O(n log n) — sort() dominates
 * Space : O(1)       — in-place sort, no extra array
 */

// ─────────────────────────────────────────────────────
// My Approach (Solved Independently)
// ─────────────────────────────────────────────────────
// Sort the array ascending.
// Largest two: last two positions (index n-1 and n-2).
// Smallest two: first two positions (index 0 and 1).
// Return their product difference.
// WHY O(n log n): sort() runs in O(n log n). Everything else is O(1).
// WHY O(1) space: PHP's sort() sorts in-place — no new array created.

function maxProductDifference(array $nums): int
{
    sort($nums);   // O(n log n)

    $n = count($nums);

    $largest  = $nums[$n - 1] * $nums[$n - 2];   // two largest
    $smallest = $nums[0]      * $nums[1];          // two smallest

    return $largest - $smallest;
}

// ─────────────────────────────────────────────────────
// Test Cases
// ─────────────────────────────────────────────────────

echo "=== Problem 04: Maximum Product Difference ===" . PHP_EOL;
echo PHP_EOL;

// Test 1
$arr1 = [5, 6, 2, 7, 4];
echo "Input : [" . implode(', ', $arr1) . "]" . PHP_EOL;
echo "Output: " . maxProductDifference($arr1) . PHP_EOL;   // Expected: 34  (7×6) - (2×4)
echo PHP_EOL;

// Test 2
$arr2 = [4, 2, 5, 9, 7, 4, 8];
echo "Input : [" . implode(', ', $arr2) . "]" . PHP_EOL;
echo "Output: " . maxProductDifference($arr2) . PHP_EOL;   // Expected: 64  (9×8) - (2×4)
echo PHP_EOL;

echo "Time Complexity : O(n log n) — because of sort()" . PHP_EOL;
echo "Space           : O(1) — in-place sort, no extra array" . PHP_EOL;
