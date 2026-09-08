<?php

/**
 * Day 06 — Problem 01
 * Topic:   Small Constraint (n = 10) — Is O(n²) acceptable?
 * Concept: Reading the constraint to decide what complexity is practical
 *
 * Run: php problem-01-constraint-small-n.php
 */

// ─────────────────────────────────────────────────────────────
// THE SETUP
// ─────────────────────────────────────────────────────────────
//
// You are given a small array of integers.
// Constraint: n <= 10
//
// Task: Check whether any two elements in the array sum to a target value.
//
// Before coding, apply the constraint habit:
//   1. n = 10
//   2. n² = 100  ← only 100 operations in the worst case
//   3. O(n²) is completely fine here
//   4. A brute force nested loop is acceptable and simple
//
// ─────────────────────────────────────────────────────────────

echo "=== Problem 01: Small Constraint — n = 10 ===" . PHP_EOL;
echo PHP_EOL;

$arr    = [3, 1, 7, 4, 9, 2, 6, 8, 5, 10];
$target = 11;
$n      = count($arr);

echo "Array:  [" . implode(', ', $arr) . "]" . PHP_EOL;
echo "Target: " . $target . PHP_EOL;
echo "n = " . $n . " → n² = " . ($n * $n) . " operations worst case" . PHP_EOL;
echo PHP_EOL;

// ─────────────────────────────────────────────────────────────
// APPROACH: Brute force — check every pair
// Time:  O(n²)  — two nested loops, each running up to n times
// Space: O(1)   — no extra data structure created
//
// With n = 10 → at most 100 comparisons. Perfectly acceptable.
// ─────────────────────────────────────────────────────────────

$found     = false;
$pairA     = null;
$pairB     = null;
$operations = 0;

for ($i = 0; $i < $n; $i++) {
    for ($j = $i + 1; $j < $n; $j++) {
        $operations++;
        if ($arr[$i] + $arr[$j] === $target) {
            $found = true;
            $pairA = $arr[$i];
            $pairB = $arr[$j];
            break 2; // stop both loops once found
        }
    }
}

// ─────────────────────────────────────────────────────────────
// OUTPUT
// ─────────────────────────────────────────────────────────────

if ($found) {
    echo "Result: FOUND — " . $pairA . " + " . $pairB . " = " . $target . PHP_EOL;
} else {
    echo "Result: No pair sums to " . $target . PHP_EOL;
}

echo "Operations performed: " . $operations . PHP_EOL;
echo PHP_EOL;

// ─────────────────────────────────────────────────────────────
// LESSON
// ─────────────────────────────────────────────────────────────

echo "--- Lesson ---" . PHP_EOL;
echo "Constraint: n <= 10" . PHP_EOL;
echo "Brute force complexity: O(n²)" . PHP_EOL;
echo "Actual operations: " . $operations . " (out of worst case " . ($n * $n) . ")" . PHP_EOL;
echo PHP_EOL;
echo "O(n²) is ACCEPTABLE when n is very small." . PHP_EOL;
echo "The simpler brute force is often preferred for small n" . PHP_EOL;
echo "because it is easier to write, easier to read, and fast enough." . PHP_EOL;
echo PHP_EOL;
echo "Key principle: The best algorithm = sufficiently efficient" . PHP_EOL;
echo "               for the constraints + reasonably simple." . PHP_EOL;
