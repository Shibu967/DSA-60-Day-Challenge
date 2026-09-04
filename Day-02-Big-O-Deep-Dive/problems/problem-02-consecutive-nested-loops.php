<?php

/**
 * Problem 02 — Consecutive + Nested Loops
 *
 * Platform  : Custom
 * Difficulty: Easy
 * Pattern   : Dominant Term Rule
 *
 * Problem Statement:
 * Analyze the time complexity of the following code and explain why.
 *
 * Code:
 *   for ($i = 0; $i < $n; $i++) { echo $i; }
 *
 *   for ($j = 0; $j < $n; $j++) {
 *       for ($k = 0; $k < $n; $k++) { echo $j + $k; }
 *   }
 *
 * Time  : O(n²)
 * Space : O(1)
 */

// ─────────────────────────────────────────────────────
// My Analysis (Solved Independently)
// ─────────────────────────────────────────────────────
//
// Part 1: Single loop → O(n)
// Part 2: Nested loops → O(n) × O(n) = O(n²)
//
// Consecutive loops → ADD complexities:
//   O(n) + O(n²) = O(n²)  ← dominant term wins
//
// For large n, the O(n) part becomes irrelevant.
// Only the dominant (largest) term survives.
//
// KEY INSIGHT: Consecutive loops → ADD → dominant term wins.

// ─────────────────────────────────────────────────────
// Dry Run: n = 3
// ─────────────────────────────────────────────────────
// Part 1 (O(n)): i = 0, 1, 2 → 3 steps
// Part 2 (O(n²)):
//   j=0: k = 0,1,2 → 3 steps
//   j=1: k = 0,1,2 → 3 steps
//   j=2: k = 0,1,2 → 3 steps
//   Total = 9 steps
//
// Grand Total = 3 + 9 = 12 steps
// Dominant term = O(n²) ← 9 >> 3 for large n ✅

// ─────────────────────────────────────────────────────
// Demonstration
// ─────────────────────────────────────────────────────

function countOps(int $n): array
{
    $linearOps = 0;
    $quadraticOps = 0;

    // Part 1: O(n)
    for ($i = 0; $i < $n; $i++) {
        $linearOps++;
    }

    // Part 2: O(n²)
    for ($j = 0; $j < $n; $j++) {
        for ($k = 0; $k < $n; $k++) {
            $quadraticOps++;
        }
    }

    return ['linear' => $linearOps, 'quadratic' => $quadraticOps];
}

echo "=== Problem 02: Consecutive + Nested Loops ===" . PHP_EOL;
echo PHP_EOL;

foreach ([5, 10, 100] as $n) {
    $ops = countOps($n);
    echo "n={$n}:" . PHP_EOL;
    echo "  O(n)  part : {$ops['linear']} steps" . PHP_EOL;
    echo "  O(n²) part : {$ops['quadratic']} steps" . PHP_EOL;
    echo "  Total      : " . ($ops['linear'] + $ops['quadratic']) . " steps" . PHP_EOL;
    echo PHP_EOL;
}

echo "Time Complexity  : O(n²) ← dominant term" . PHP_EOL;
echo "Space Complexity : O(1)" . PHP_EOL;
