<?php

/**
 * Day 07 — Revision Problem 05
 * Topic:   Rewrite a slow nested loop using a mathematical formula
 * Skill:   Recognize 1+2+3+...+n pattern → replace with O(1) formula
 *
 * Run: php problem-05-formula-optimization.php
 */

// ─────────────────────────────────────────────────────────────
// THE PROBLEM
// ─────────────────────────────────────────────────────────────
//
// function sumOfSquares(int $n): int {
//     $result = 0;
//     for ($i = 1; $i <= $n; $i++) {
//         for ($j = 1; $j <= $i; $j++) {
//             $result += 1;
//         }
//     }
//     return $result;
// }
//
// Q1. What is the time complexity of this function?
// Q2. Can you write a mathematical formula that computes the same
//     result in O(1)? (Hint: sum of 1+2+3+...+n)
//
// ─────────────────────────────────────────────────────────────

echo "=== Day 07 — Problem 05: Formula Optimization ===" . PHP_EOL;
echo PHP_EOL;

// ─────────────────────────────────────────────────────────────
// SLOW VERSION — O(n²) nested loop
// ─────────────────────────────────────────────────────────────

function sumOfSquaresSlow(int $n): int
{
    $result = 0;
    for ($i = 1; $i <= $n; $i++) {
        for ($j = 1; $j <= $i; $j++) {
            $result += 1;   // counts total inner iterations
        }
    }
    return $result;
}

// ─────────────────────────────────────────────────────────────
// Q1 — COMPLEXITY ANALYSIS OF SLOW VERSION
// ─────────────────────────────────────────────────────────────

echo "--- Q1: Time complexity of slow version ---" . PHP_EOL;
echo PHP_EOL;
echo "When i=1: inner loop runs 1 time" . PHP_EOL;
echo "When i=2: inner loop runs 2 times" . PHP_EOL;
echo "When i=3: inner loop runs 3 times" . PHP_EOL;
echo "..." . PHP_EOL;
echo "When i=n: inner loop runs n times" . PHP_EOL;
echo PHP_EOL;
echo "Total iterations = 1 + 2 + 3 + ... + n" . PHP_EOL;
echo "                 = n*(n+1)/2" . PHP_EOL;
echo "                 ≈ n²/2" . PHP_EOL;
echo "                 = O(n²)" . PHP_EOL;
echo PHP_EOL;
echo "The inner loop is NOT a constant — it grows with i." . PHP_EOL;
echo "This makes the total work quadratic." . PHP_EOL;
echo PHP_EOL;

// ─────────────────────────────────────────────────────────────
// Q2 — FAST VERSION — O(1) formula
// ─────────────────────────────────────────────────────────────

function sumOfSquaresFast(int $n): int
{
    return (int)(($n * ($n + 1)) / 2);
    // Formula: 1 + 2 + 3 + ... + n = n*(n+1)/2
    // No loops. One arithmetic expression. O(1).
}

echo "--- Q2: Mathematical formula — O(1) ---" . PHP_EOL;
echo PHP_EOL;
echo "The function computes: 1 + 2 + 3 + ... + n" . PHP_EOL;
echo "This is the sum of the first n natural numbers." . PHP_EOL;
echo "Formula: n * (n + 1) / 2" . PHP_EOL;
echo PHP_EOL;
echo "No loop needed. One arithmetic operation. O(1) time." . PHP_EOL;
echo PHP_EOL;

// ─────────────────────────────────────────────────────────────
// VERIFY BOTH GIVE THE SAME RESULT
// ─────────────────────────────────────────────────────────────

echo "--- Verification ---" . PHP_EOL;
echo PHP_EOL;

$tests = [1, 5, 10, 100];

foreach ($tests as $n) {
    $slow = sumOfSquaresSlow($n);
    $fast = sumOfSquaresFast($n);
    $match = ($slow === $fast) ? "MATCH" : "MISMATCH";
    echo "n = " . str_pad($n, 4) . " | slow = " . str_pad($slow, 6) . " | fast = " . str_pad($fast, 6) . " | " . $match . PHP_EOL;
}

echo PHP_EOL;

// ─────────────────────────────────────────────────────────────
// COMPARISON
// ─────────────────────────────────────────────────────────────

echo "--- Comparison ---" . PHP_EOL;
echo PHP_EOL;
echo "Slow version (nested loop):   O(n²) time, O(1) space" . PHP_EOL;
echo "Fast version (formula):       O(1)  time, O(1) space" . PHP_EOL;
echo PHP_EOL;
echo "For n = 1,000,000:" . PHP_EOL;
echo "  Slow → ~500,000,000,000 iterations" . PHP_EOL;
echo "  Fast → 1 arithmetic operation" . PHP_EOL;
echo PHP_EOL;
echo "--- Key lesson ---" . PHP_EOL;
echo "When a loop computes a well-known mathematical series (like 1+2+...+n)," . PHP_EOL;
echo "a closed-form formula often replaces the loop entirely → O(1)." . PHP_EOL;
echo "This is rare in practice but important to recognize when it appears." . PHP_EOL;
