<?php

/**
 * Problem 07 — Two Sum
 *
 * Platform  : LeetCode
 * Difficulty: Easy
 * Pattern   : Brute O(n²) → HashMap O(n) — classic interview problem
 *
 * Problem Statement:
 * Given an array of integers and a target, return the indices of the
 * two numbers that add up to the target. Exactly one valid answer exists.
 * You may not use the same element twice.
 *
 * Input : nums = [2, 7, 11, 15], target = 9
 * Output: [0, 1]   because 2 + 7 = 9
 *
 * Brute Force Time : O(n²) — nested loop, check every pair
 * Optimal Time     : O(n)  — HashMap, one pass
 * Space            : O(n)  — HashMap stores value → index
 */

// ─────────────────────────────────────────────────────
// Approach 1 — Brute Force
// ─────────────────────────────────────────────────────
// For every pair (i, j), check if nums[i] + nums[j] == target.
// This checks all possible pairs → O(n²).

function twoSumBrute(array $nums, int $target): array
{
    $n = count($nums);

    for ($i = 0; $i < $n; $i++) {
        for ($j = $i + 1; $j < $n; $j++) {
            if ($nums[$i] + $nums[$j] === $target) {
                return [$i, $j];
            }
        }
    }

    return [];
}

// ─────────────────────────────────────────────────────
// Approach 2 — HashMap (Optimal)
// ─────────────────────────────────────────────────────
// For each number, calculate what we NEED to complete the pair:
//   complement = target - current
// Check if that complement is already in the map.
//   Yes → we found both numbers → return their indices
//   No  → store current number → index in map, continue
//
// WHY O(n): single loop, O(1) HashMap ops each step.
// WHY this works: if nums[j] + nums[i] = target, then when we reach
// nums[j], nums[i] is already in the map (we stored it earlier).

function twoSumOptimal(array $nums, int $target): array
{
    $map = [];   // value → index

    foreach ($nums as $i => $num) {
        $complement = $target - $num;

        if (isset($map[$complement])) {
            return [$map[$complement], $i];   // found!
        }

        $map[$num] = $i;   // store for future lookups
    }

    return [];
}

// ─────────────────────────────────────────────────────
// Test Cases
// ─────────────────────────────────────────────────────

echo "=== Problem 07: Two Sum ===" . PHP_EOL;
echo PHP_EOL;

// Test 1: standard case
$arr1 = [2, 7, 11, 15];
$target1 = 9;
echo "Input : [" . implode(', ', $arr1) . "], target = $target1" . PHP_EOL;
echo "Brute : [" . implode(', ', twoSumBrute($arr1, $target1)) . "]" . PHP_EOL;    // Expected: [0, 1]
echo "Optimal: [" . implode(', ', twoSumOptimal($arr1, $target1)) . "]" . PHP_EOL;
echo PHP_EOL;

// Test 2: answer not at start
$arr2 = [3, 2, 4];
$target2 = 6;
echo "Input : [" . implode(', ', $arr2) . "], target = $target2" . PHP_EOL;
echo "Brute : [" . implode(', ', twoSumBrute($arr2, $target2)) . "]" . PHP_EOL;    // Expected: [1, 2]
echo "Optimal: [" . implode(', ', twoSumOptimal($arr2, $target2)) . "]" . PHP_EOL;
echo PHP_EOL;

// Test 3: same value at different indices
$arr3 = [3, 3];
$target3 = 6;
echo "Input : [" . implode(', ', $arr3) . "], target = $target3" . PHP_EOL;
echo "Brute : [" . implode(', ', twoSumBrute($arr3, $target3)) . "]" . PHP_EOL;    // Expected: [0, 1]
echo "Optimal: [" . implode(', ', twoSumOptimal($arr3, $target3)) . "]" . PHP_EOL;
echo PHP_EOL;

// Walkthrough — how the HashMap builds step by step
echo "--- HashMap walkthrough (Test 1, target = 9) ---" . PHP_EOL;
$walk = [2, 7, 11, 15];
$walkMap = [];
foreach ($walk as $i => $num) {
    $complement = 9 - $num;
    $status = isset($walkMap[$complement])
        ? "FOUND → return [{$walkMap[$complement]}, $i]"
        : "store $num → $i";
    echo "i=$i  num=$num  complement=$complement  $status" . PHP_EOL;
    if (!isset($walkMap[$complement])) {
        $walkMap[$num] = $i;
    }
}
echo PHP_EOL;

echo "Brute Time  : O(n²) — check every pair" . PHP_EOL;
echo "Optimal Time: O(n)  — single pass, O(1) HashMap lookup" . PHP_EOL;
echo "Space       : O(n)  — HashMap stores value → index" . PHP_EOL;
