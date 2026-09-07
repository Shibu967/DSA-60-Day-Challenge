<?php

/**
 * Problem 05 — How Many Numbers Are Smaller Than the Current Number
 *
 * Platform  : LeetCode
 * Difficulty: Easy
 * Pattern   : Brute O(n²) → Sort + count map → O(n log n)
 *
 * Problem Statement:
 * For each number in the array, count how many other numbers in the
 * array are strictly smaller than it.
 *
 * Input : [8, 1, 2, 2, 3]
 * Output: [4, 0, 1, 1, 3]
 *
 * Brute Force Time : O(n²) — nested loops
 * Optimal Time     : O(n log n) — sort + index as count
 * Space            : O(n) — sorted copy and count map
 */

// ─────────────────────────────────────────────────────
// Approach 1 — Brute Force
// ─────────────────────────────────────────────────────
// For each number, loop through the entire array and count how many
// are smaller. This is O(n²) — nested loop, same array.

function smallerNumbersBrute(array $nums): array
{
    $result = [];

    foreach ($nums as $current) {
        $count = 0;
        foreach ($nums as $num) {
            if ($num < $current) {
                $count++;
            }
        }
        $result[] = $count;
    }

    return $result;
}

// ─────────────────────────────────────────────────────
// Approach 2 — Optimal (Sort + Count Map)
// ─────────────────────────────────────────────────────
// KEY INSIGHT: In a sorted array, the index of the first occurrence
// of a value equals the count of elements smaller than it.
//
// Example:
//   sorted = [1, 2, 2, 3, 8]
//   index:    0  1  2  3  4
//   value 1 → index 0 → 0 elements smaller
//   value 2 → index 1 → 1 element smaller
//   value 3 → index 3 → 3 elements smaller
//   value 8 → index 4 → 4 elements smaller
//
// For duplicates: store only the FIRST occurrence index.
// WHY O(n log n): dominated by sort(). Map build and lookup are O(n).

function smallerNumbersOptimal(array $nums): array
{
    // Step 1: Sort a copy — O(n log n)
    $sorted = $nums;
    sort($sorted);

    // Step 2: Build count map — first occurrence index = count of smaller
    $countMap = [];
    foreach ($sorted as $index => $value) {
        if (!isset($countMap[$value])) {   // only store first occurrence
            $countMap[$value] = $index;
        }
    }

    // Step 3: Map each original element to its count
    $result = [];
    foreach ($nums as $num) {
        $result[] = $countMap[$num];
    }

    return $result;
}

// ─────────────────────────────────────────────────────
// Test Cases
// ─────────────────────────────────────────────────────

echo "=== Problem 05: How Many Numbers Are Smaller ===" . PHP_EOL;
echo PHP_EOL;

// Test 1: general case
$arr1 = [8, 1, 2, 2, 3];
echo "Input : [" . implode(', ', $arr1) . "]" . PHP_EOL;
echo "Brute : [" . implode(', ', smallerNumbersBrute($arr1)) . "]" . PHP_EOL;    // Expected: 4, 0, 1, 1, 3
echo "Optimal: [" . implode(', ', smallerNumbersOptimal($arr1)) . "]" . PHP_EOL; // Expected: 4, 0, 1, 1, 3
echo PHP_EOL;

// Test 2
$arr2 = [6, 5, 4, 8];
echo "Input : [" . implode(', ', $arr2) . "]" . PHP_EOL;
echo "Optimal: [" . implode(', ', smallerNumbersOptimal($arr2)) . "]" . PHP_EOL; // Expected: 2, 1, 0, 3
echo PHP_EOL;

// Test 3: all same values (duplicate edge case)
$arr3 = [7, 7, 7, 7];
echo "Input : [" . implode(', ', $arr3) . "] (all duplicates)" . PHP_EOL;
echo "Optimal: [" . implode(', ', smallerNumbersOptimal($arr3)) . "]" . PHP_EOL; // Expected: 0, 0, 0, 0
echo PHP_EOL;

echo "Brute Time  : O(n²) — nested loop" . PHP_EOL;
echo "Optimal Time: O(n log n) — sort dominates" . PHP_EOL;
echo "Space       : O(n) — sorted copy + count map" . PHP_EOL;
