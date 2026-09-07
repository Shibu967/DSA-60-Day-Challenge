<?php

/**
 * Problem   : Maximum Product Difference Between Two Pairs
 * Link      : https://leetcode.com/problems/maximum-product-difference-between-two-pairs/
 * Difficulty: Easy
 * Day       : 05 — Complexity Pattern Recognition
 *
 * ─────────────────────────────────────────
 * DESCRIPTION:
 * Array में से 4 अलग-अलग indices (w, x, y, z) चुनो जिनसे
 * (nums[w] × nums[x]) - (nums[y] × nums[z]) maximize हो।
 *
 * Input : [5, 6, 2, 7, 4]
 * Output: 34
 *
 * Explanation:
 *   Sorted: [2, 4, 5, 6, 7]
 *   Largest two:  7 × 6 = 42
 *   Smallest two: 2 × 4 = 8
 *   42 - 8 = 34
 *
 * ─────────────────────────────────────────
 * KEY INSIGHT:
 * Maximum product difference के लिए:
 * → Largest दो numbers का product - Smallest दो numbers का product
 *
 * Sort करो → last two और first two index directly access करो।
 *
 * ─────────────────────────────────────────
 * COMPLEXITY:
 * Time  : O(n log n) — sort() की वजह से
 * Space : O(1)       — in-place sort, कोई extra array नहीं
 *
 * ─────────────────────────────────────────
 * PATTERN LEARNED:
 * Sort first → smallest/largest elements known indices पर मिलते हैं
 * Sorting का cost = O(n log n) — always state this in interview
 * ─────────────────────────────────────────
 */

function maxProductDifference(array $nums): int
{
    // Step 1: Sort ascending — O(n log n)
    sort($nums);

    $n = count($nums);

    // Step 2: O(1) — index access
    $largest  = $nums[$n - 1] * $nums[$n - 2];   // two largest
    $smallest = $nums[0]      * $nums[1];          // two smallest

    return $largest - $smallest;
}

// ─── Test Cases ───────────────────────────────────────────────
echo "=== Problem 4: Maximum Product Difference ===" . PHP_EOL . PHP_EOL;

$test1 = [5, 6, 2, 7, 4];
echo "Input:    [5, 6, 2, 7, 4]" . PHP_EOL;
echo "Output:   " . maxProductDifference($test1) . PHP_EOL;
echo "Expected: 34" . PHP_EOL . PHP_EOL;

$test2 = [4, 2, 5, 9, 7, 4, 8];
echo "Input:    [4, 2, 5, 9, 7, 4, 8]" . PHP_EOL;
echo "Output:   " . maxProductDifference($test2) . PHP_EOL;
echo "Expected: 64" . PHP_EOL;

echo PHP_EOL;
echo "--- Complexity Analysis ---" . PHP_EOL;
echo "Time:  O(n log n) — because of sort()" . PHP_EOL;
echo "Space: O(1)       — in-place sort, no extra array" . PHP_EOL;
