<?php

/**
 * Day 08 — Arrays: Fundamentals
 * Problem 3 — Find Maximum
 *
 * Task: Find the maximum value in an array WITHOUT using max().
 *
 * Pattern:  Initialize → Traverse → Compare → Update
 *
 * Time:  O(n) — every element visited once
 * Space: O(1) — only one variable used
 */

$arr = [10, 25, 3, 45, 7, 18];

$max = $arr[0];  // Initialize with first element

foreach ($arr as $val) {
    if ($val > $max) {
        $max = $val;  // Update if larger found
    }
}

echo "Maximum: " . $max . PHP_EOL;

// Output: Maximum: 45
