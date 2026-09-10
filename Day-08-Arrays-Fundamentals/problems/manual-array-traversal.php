<?php

/**
 * Day 08 — Arrays: Fundamentals
 * Problem 1 — Manual Array Traversal
 *
 * Task: Traverse every element of an array and print each value.
 *
 * Time:  O(n) — every element visited exactly once
 * Space: O(1) — no extra data structure
 */

$arr = [10, 20, 30, 40, 50];

foreach ($arr as $val) {
    echo $val . PHP_EOL;
}

// Output:
// 10
// 20
// 30
// 40
// 50
