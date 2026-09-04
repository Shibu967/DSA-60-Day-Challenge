<?php

/**
 * Problem 03 — Variable-Dependent Inner Loop
 *
 * Platform  : Custom
 * Difficulty: Easy
 * Pattern   : Variable inner loop → O(n²)
 *
 * Problem Statement:
 * Analyze the time complexity of the following code and explain why.
 *
 * Code:
 *   for ($i = 0; $i < $n; $i++) {
 *       for ($j = $i; $j < $n; $j++) {
 *           echo $i + $j;
 *       }
 *   }
 *
 * Time  : O(n²)
 * Space : O(1)
 */

// ─────────────────────────────────────────────────────
// My Analysis (Solved Independently)
// ─────────────────────────────────────────────────────
//
// The inner loop does NOT start from 0 — it starts from $i.
// So the number of inner iterations decreases as $i increases.
//
// i=0 → inner runs n   times
// i=1 → inner runs n-1 times
// i=2 → inner runs n-2 times
// ...
// i=n-1 → inner runs 1 time
//
// Total = n + (n-1) + (n-2) + ... + 1
//       = n(n+1)/2
//       = O(n²)
//
// KEY INSIGHT: Variable-dependent inner loop → still O(n²).
// It looks "smaller" than a full nested loop but the complexity
// class is the same — n(n+1)/2 is still O(n²).

// ─────────────────────────────────────────────────────
// Dry Run: n = 4
// ─────────────────────────────────────────────────────
// i=0: j = 0,1,2,3 → 4 steps
// i=1: j = 1,2,3   → 3 steps
// i=2: j = 2,3     → 2 steps
// i=3: j = 3       → 1 step
// Total = 4+3+2+1 = 10 = 4(5)/2 → O(n²) ✅

// ─────────────────────────────────────────────────────
// Demonstration
// ─────────────────────────────────────────────────────

function countVariableOps(int $n): int
{
    $steps = 0;

    for ($i = 0; $i < $n; $i++) {
        for ($j = $i; $j < $n; $j++) {
            $steps++;
        }
    }

    return $steps;
}

echo "=== Problem 03: Variable-Dependent Inner Loop ===" . PHP_EOL;
echo PHP_EOL;

foreach ([4, 5, 10] as $n) {
    $steps = countVariableOps($n);
    $formula = $n * ($n + 1) / 2;
    echo "n={$n}: actual steps = {$steps}, formula n(n+1)/2 = {$formula}" . PHP_EOL;
}

echo PHP_EOL;
echo "Time Complexity  : O(n²)" . PHP_EOL;
echo "Space Complexity : O(1)" . PHP_EOL;
