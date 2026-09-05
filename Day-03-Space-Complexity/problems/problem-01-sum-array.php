<?php

/**
 * Problem 01 — Analyze Space Complexity: Sum of Array
 *
 * Platform  : Custom
 * Difficulty: Easy
 * Pattern   : O(1) auxiliary space — single variable
 *
 * Problem Statement:
 * Analyze the auxiliary space complexity of sumArray().
 *
 * Time  : O(n)
 * Auxiliary Space : O(1)
 */

// ─────────────────────────────────────────────────────
// My Analysis (Solved Independently — with correction)
// ─────────────────────────────────────────────────────
//
// Step 1: Extra data? Yes — $total variable
// Step 2: Fixed or grows with n? FIXED — always 1 variable
// Step 3: Array/map elements stored? None
// Step 4: 2D structure? No
// Step 5: Recursion? No
// Step 6: Multiple structures? No
//
// Auxiliary Space = O(1)
//
// MISTAKE I MADE: I said $total = O(n) — WRONG!
// $total is ONE variable regardless of n.
// Loop runs n times (Time = O(n)), but only 1 variable is stored.
// KEY RULE: "Loop running n times ≠ O(n) space"

// ─────────────────────────────────────────────────────
// Implementation
// ─────────────────────────────────────────────────────

function sumArray(array $arr): int
{
    $total = 0;                    // 1 extra variable — O(1) space

    foreach ($arr as $val) {
        $total += $val;            // update same variable — no new memory
    }

    return $total;
}

// ─────────────────────────────────────────────────────
// Test Cases
// ─────────────────────────────────────────────────────

echo "=== Problem 01: Sum of Array ===" . PHP_EOL;
echo PHP_EOL;
echo "sumArray([1,2,3,4,5])   = " . sumArray([1, 2, 3, 4, 5]) . PHP_EOL;   // 15
echo "sumArray([10,20,30])    = " . sumArray([10, 20, 30]) . PHP_EOL;       // 60
echo "sumArray([0])           = " . sumArray([0]) . PHP_EOL;                // 0
echo "sumArray([-1,-2,-3])    = " . sumArray([-1, -2, -3]) . PHP_EOL;      // -6
echo PHP_EOL;
echo "Time Complexity      : O(n)" . PHP_EOL;
echo "Auxiliary Space      : O(1) — only \$total variable" . PHP_EOL;
