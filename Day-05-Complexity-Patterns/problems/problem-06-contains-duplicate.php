<?php

/**
 * Problem 06 — Contains Duplicate
 *
 * Platform  : LeetCode
 * Difficulty: Easy
 * Pattern   : Brute O(n²) → HashMap O(n)
 *
 * Problem Statement:
 * Given an array of integers, return true if any value appears
 * more than once. Otherwise return false.
 *
 * Brute Force Time : O(n²) — check every pair
 * Optimal Time     : O(n)  — HashMap, one pass
 * Space            : O(n)  — HashMap stores seen values
 */

// ─────────────────────────────────────────────────────
// Approach 1 — Brute Force
// ─────────────────────────────────────────────────────
// Compare every pair of elements. If any pair matches → duplicate.
// This is O(n²) — for each element, scan all remaining elements.

function containsDuplicateBrute(array $nums): bool
{
    $n = count($nums);

    for ($i = 0; $i < $n; $i++) {
        for ($j = $i + 1; $j < $n; $j++) {
            if ($nums[$i] === $nums[$j]) {
                return true;   // found a pair
            }
        }
    }

    return false;
}

// ─────────────────────────────────────────────────────
// Approach 2 — HashMap (Optimal)
// ─────────────────────────────────────────────────────
// Walk through the array once. For each element:
//   - If it is already in the map → we have seen it before → duplicate
//   - If not → store it in the map and continue
// WHY O(n): single loop, O(1) HashMap operations each step.
// WHY O(n) space: in the worst case, all elements are unique and stored.

function containsDuplicateOptimal(array $nums): bool
{
    $seen = [];

    foreach ($nums as $num) {
        if (isset($seen[$num])) {
            return true;   // seen before → duplicate
        }
        $seen[$num] = true;   // first time → store it
    }

    return false;
}

// ─────────────────────────────────────────────────────
// Test Cases
// ─────────────────────────────────────────────────────

echo "=== Problem 06: Contains Duplicate ===" . PHP_EOL;
echo PHP_EOL;

// Test 1: has duplicate
$arr1 = [1, 2, 3, 1];
echo "Input : [" . implode(', ', $arr1) . "]" . PHP_EOL;
echo "Brute : "   . (containsDuplicateBrute($arr1)   ? 'true' : 'false') . PHP_EOL;   // Expected: true
echo "Optimal: "  . (containsDuplicateOptimal($arr1) ? 'true' : 'false') . PHP_EOL;
echo PHP_EOL;

// Test 2: no duplicate
$arr2 = [1, 2, 3, 4];
echo "Input : [" . implode(', ', $arr2) . "]" . PHP_EOL;
echo "Brute : "   . (containsDuplicateBrute($arr2)   ? 'true' : 'false') . PHP_EOL;   // Expected: false
echo "Optimal: "  . (containsDuplicateOptimal($arr2) ? 'true' : 'false') . PHP_EOL;
echo PHP_EOL;

// Test 3: multiple duplicates
$arr3 = [1, 1, 1, 3, 3, 4, 3, 2, 4, 2];
echo "Input : [" . implode(', ', $arr3) . "]" . PHP_EOL;
echo "Brute : "   . (containsDuplicateBrute($arr3)   ? 'true' : 'false') . PHP_EOL;   // Expected: true
echo "Optimal: "  . (containsDuplicateOptimal($arr3) ? 'true' : 'false') . PHP_EOL;
echo PHP_EOL;

echo "Brute Time  : O(n²) — check every pair" . PHP_EOL;
echo "Optimal Time: O(n)  — single pass with HashMap" . PHP_EOL;
echo "Space       : O(n)  — HashMap stores seen values" . PHP_EOL;
