<?php

/**
 * Problem 03 — Analyze Space Complexity: Recursive Factorial
 *
 * Platform  : Custom
 * Difficulty: Easy
 * Pattern   : O(n) auxiliary space — recursion stack
 *
 * Problem Statement:
 * Analyze the auxiliary space complexity of factorial().
 *
 * Time  : O(n)
 * Auxiliary Space : O(n) — recursion stack depth
 */

// ─────────────────────────────────────────────────────
// My Analysis (Solved Independently)
// ─────────────────────────────────────────────────────
//
// Step 1: Extra data? No extra arrays or variables
// Step 2: Fixed? No — stack grows with n
// Step 3: Array/map stored? No
// Step 4: 2D structure? No
// Step 5: Recursion? YES — max depth = n
//   factorial(n) → factorial(n-1) → ... → factorial(0)
//   Each call adds 1 frame → n+1 frames total → O(n) stack space
// Step 6: Multiple structures? No
//
// Auxiliary Space = O(n) — stack frames only, no extra arrays
//
// KEY INSIGHT: Even with no extra variables, recursion uses
// O(n) auxiliary space because each call stays on the stack
// until the base case returns.

// ─────────────────────────────────────────────────────
// Dry Run: factorial(4)
// ─────────────────────────────────────────────────────
// factorial(4) → waiting for factorial(3)
// factorial(3) → waiting for factorial(2)
// factorial(2) → waiting for factorial(1)
// factorial(1) → waiting for factorial(0)
// factorial(0) → returns 1 ← base case
//
// Max stack depth = 5 frames = O(n)
// Unwinding: 1 → 1×1=1 → 2×1=2 → 3×2=6 → 4×6=24

// ─────────────────────────────────────────────────────
// Implementation
// ─────────────────────────────────────────────────────

function factorial(int $n): int
{
    if ($n === 0) return 1;           // base case
    return $n * factorial($n - 1);   // adds 1 stack frame per call
}

// ─────────────────────────────────────────────────────
// Test Cases
// ─────────────────────────────────────────────────────

echo "=== Problem 03: Recursive Factorial ===" . PHP_EOL;
echo PHP_EOL;
echo "factorial(0) = " . factorial(0) . PHP_EOL;  // 1
echo "factorial(1) = " . factorial(1) . PHP_EOL;  // 1
echo "factorial(4) = " . factorial(4) . PHP_EOL;  // 24
echo "factorial(5) = " . factorial(5) . PHP_EOL;  // 120
echo PHP_EOL;
echo "Time Complexity      : O(n)" . PHP_EOL;
echo "Auxiliary Space      : O(n) — recursion stack depth = n+1 frames" . PHP_EOL;
