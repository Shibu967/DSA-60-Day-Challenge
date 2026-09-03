<?php

/**
 * Problem 05 — Linear Search
 *
 * Platform  : Custom
 * Difficulty: Easy
 * Pattern   : Linear Scan
 *
 * Problem Statement:
 * Given an array of integers and a target value, return the index of
 * the target if found. If not found, return -1.
 *
 * Time  : O(n) — worst case: target is last element or not present
 * Space : O(1) — no extra data structures used
 */

// ─────────────────────────────────────────────────────
// My Approach (Solved Independently)
// ─────────────────────────────────────────────────────
// Walk through array using $key => $val.
// If current value === target, return the key (index).
// If loop ends without finding, return -1.
//
// WHY O(n): Worst case — target is at the last position,
// so we check every element. Best case is O(1) if it's at index 0.
// But Big O = WORST case → O(n).
//
// KEY INSIGHT: Return immediately when found — no need to
// check remaining elements. This is called "early termination".

function linearSearch(array $arr, int $target): int
{
    foreach ($arr as $key => $val) {
        if ($target === $val) {
            return $key; // Found — return index immediately
        }
    }

    return -1; // Not found
}

// ─────────────────────────────────────────────────────
// Test Cases
// ─────────────────────────────────────────────────────

echo "=== Problem 05: Linear Search ===" . PHP_EOL;
echo PHP_EOL;

// Test 1: Target in the middle
$arr1 = [3, 7, 1, 9, 4];
echo "Input : [" . implode(', ', $arr1) . "], target = 9" . PHP_EOL;
echo "Output: " . linearSearch($arr1, 9) . PHP_EOL; // Expected: 3
echo PHP_EOL;

// Test 2: Target at the beginning (best case — O(1) in practice)
$arr2 = [3, 7, 1, 9, 4];
echo "Input : [" . implode(', ', $arr2) . "], target = 3" . PHP_EOL;
echo "Output: " . linearSearch($arr2, 3) . PHP_EOL; // Expected: 0
echo PHP_EOL;

// Test 3: Target at the end (worst case — O(n) in practice)
$arr3 = [3, 7, 1, 9, 4];
echo "Input : [" . implode(', ', $arr3) . "], target = 4" . PHP_EOL;
echo "Output: " . linearSearch($arr3, 4) . PHP_EOL; // Expected: 4
echo PHP_EOL;

// Test 4: Target NOT in array → must return -1
$arr4 = [3, 7, 1, 9, 4];
echo "Input : [" . implode(', ', $arr4) . "], target = 100" . PHP_EOL;
echo "Output: " . linearSearch($arr4, 100) . PHP_EOL; // Expected: -1
echo PHP_EOL;

// Test 5: Single element — found
$arr5 = [42];
echo "Input : [" . implode(', ', $arr5) . "], target = 42" . PHP_EOL;
echo "Output: " . linearSearch($arr5, 42) . PHP_EOL; // Expected: 0
