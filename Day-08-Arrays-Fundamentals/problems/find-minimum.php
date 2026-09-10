<?php

/**
 * Day 08 — Arrays: Fundamentals
 * Problem 2 — Find Minimum
 *
 * Task: Find the minimum value in an array WITHOUT using min().
 *
 * Pattern:  Initialize → Traverse → Compare → Update
 *
 * Time:  O(n) — every element visited once
 * Space: O(1) — only one variable used
 */

$arr = [10, 25, 3, 45, 7, 18];

$min = $arr[0];  // Initialize with first element

foreach ($arr as $val) {
    if ($val < $min) {
        $min = $val;  // Update if smaller found
    }
}

echo "Minimum: " . $min . PHP_EOL;

// Output: Minimum: 3
