<?php

/**
 * Problem 01 — Multiplicative Loop Complexity
 *
 * Platform  : Custom
 * Difficulty: Easy
 * Pattern   : O(log n) — multiplicative growth
 *
 * Problem Statement:
 * Analyze the time complexity of the following code and explain why.
 *
 * Code:
 *   for ($i = 1; $i < $n; $i *= 3) {
 *       echo $i;
 *   }
 *
 * Time  : O(log n)
 * Space : O(1)
 */

// ─────────────────────────────────────────────────────
// My Analysis (Solved Independently)
// ─────────────────────────────────────────────────────
//
// $i is multiplied by 3 in each iteration → multiplicative growth.
// i = 1, 3, 9, 27, 81, ... until i >= n
//
// The loop runs log₃(n) times.
// Big O ignores log bases → O(log n)
//
// KEY INSIGHT: i *= constant → always O(log n)
// Same applies to: i *= 2, i *= 3, i *= 5, etc.

// ─────────────────────────────────────────────────────
// Dry Run: n = 27
// ─────────────────────────────────────────────────────
// Step 1: i = 1  → 1  < 27? Yes → i = 1 × 3 = 3
// Step 2: i = 3  → 3  < 27? Yes → i = 3 × 3 = 9
// Step 3: i = 9  → 9  < 27? Yes → i = 9 × 3 = 27
// Step 4: i = 27 → 27 < 27? No  → STOP
//
// Total steps: 3 = log₃(27) → O(log n) ✅

// ─────────────────────────────────────────────────────
// Demonstration
// ─────────────────────────────────────────────────────

function countSteps(int $n): int
{
    $steps = 0;

    for ($i = 1; $i < $n; $i *= 3) {
        $steps++;
    }

    return $steps;
}

echo "=== Problem 01: Multiplicative Loop (i *= 3) ===" . PHP_EOL;
echo PHP_EOL;
echo "n=9   → steps: " . countSteps(9) . PHP_EOL;    // Expected: 2
echo "n=27  → steps: " . countSteps(27) . PHP_EOL;   // Expected: 3
echo "n=81  → steps: " . countSteps(81) . PHP_EOL;   // Expected: 4
echo "n=243 → steps: " . countSteps(243) . PHP_EOL;  // Expected: 5
echo PHP_EOL;
echo "Time Complexity  : O(log n)" . PHP_EOL;
echo "Space Complexity : O(1)" . PHP_EOL;
