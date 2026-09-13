<?php

/**
 * Day 08 — Arrays: Fundamentals
 * Problem 06 — Sum of Array Elements
 *
 * Task: Calculate the sum of all elements in the array.
 *
 * Pattern: Initialize → Traverse → Update
 *
 * Time: O(n) — every element visited once
 * Space: O(1) — only one variable used
 */

$arr = [10, 20, 30, 40, 50];

$sum = 0;

for ($i = 0; $i < count($arr); $i++) {
    $sum += $arr[$i];
}

// Test Case 1
// Expected: 150
echo $sum . PHP_EOL;
