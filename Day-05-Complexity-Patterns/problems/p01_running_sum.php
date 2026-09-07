<?php

/**
 * Problem   : Running Sum of 1d Array
 * Link      : https://leetcode.com/problems/running-sum-of-1d-array/
 * Difficulty: Easy
 * Day       : 05 — Complexity Pattern Recognition
 *
 * ─────────────────────────────────────────
 * DESCRIPTION:
 * एक array दिया जाता है। हर position पर उस position तक के
 * सभी numbers का cumulative sum रखना है।
 *
 * Input : [1, 2, 3, 4]
 * Output: [1, 3, 6, 10]
 *
 * ─────────────────────────────────────────
 * APPROACH:
 * Single loop — हर index पर previous value add करो (in-place)
 *
 * nums[1] = nums[1] + nums[0]  → 2 + 1 = 3
 * nums[2] = nums[2] + nums[1]  → 3 + 3 = 6
 * nums[3] = nums[3] + nums[2]  → 4 + 6 = 10
 *
 * ─────────────────────────────────────────
 * COMPLEXITY:
 * Time Complexity      : O(n)  — single loop, n iterations
 * Auxiliary Space      : O(1)  — in-place modification, no new array
 * Total Space (output) : O(n)  — but this is the output itself
 *
 * ─────────────────────────────────────────
 * PATTERN LEARNED:
 * Single loop + in-place modification = O(n) time, O(1) auxiliary space
 * ─────────────────────────────────────────
 */

function runningSum(array $nums): array
{
    for ($i = 1; $i < count($nums); $i++) {
        $nums[$i] += $nums[$i - 1];
    }

    return $nums;
}

// ─── Test Cases ───────────────────────────────────────────────
echo "=== Problem 1: Running Sum of 1d Array ===" . PHP_EOL;

$test1 = [1, 2, 3, 4];
echo "Input:    [1, 2, 3, 4]" . PHP_EOL;
echo "Output:   " . implode(", ", runningSum($test1)) . PHP_EOL;
echo "Expected: 1, 3, 6, 10" . PHP_EOL . PHP_EOL;

$test2 = [1, 1, 1, 1, 1];
echo "Input:    [1, 1, 1, 1, 1]" . PHP_EOL;
echo "Output:   " . implode(", ", runningSum($test2)) . PHP_EOL;
echo "Expected: 1, 2, 3, 4, 5" . PHP_EOL . PHP_EOL;

$test3 = [3, 1, 2, 10, 1];
echo "Input:    [3, 1, 2, 10, 1]" . PHP_EOL;
echo "Output:   " . implode(", ", runningSum($test3)) . PHP_EOL;
echo "Expected: 3, 4, 6, 16, 17" . PHP_EOL;
