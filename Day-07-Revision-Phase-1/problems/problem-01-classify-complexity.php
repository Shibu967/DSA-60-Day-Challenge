<?php

/**
 * Day 07 — Revision Problem 01
 * Topic:   Read and classify complexity of a multi-step function
 * Skill:   Identify nested vs sequential loops and find the dominant term
 *
 * Run: php problem-01-classify-complexity.php
 */

// ─────────────────────────────────────────────────────────────
// THE PROBLEM
// ─────────────────────────────────────────────────────────────
//
// Given this function, answer:
//   Q1. What is the time complexity?
//   Q2. What is the dominant term?
//   Q3. Why is that term dominant?
//
// ─────────────────────────────────────────────────────────────

echo "=== Day 07 — Problem 01: Classify Complexity ===" . PHP_EOL;
echo PHP_EOL;

// The function to analyze:
function process(array $arr): void
{
    // Part A — nested loops
    for ($i = 0; $i < count($arr); $i++) {
        for ($j = 0; $j < count($arr); $j++) {
            // O(1) work per inner step
            $x = $arr[$i] + $arr[$j];
        }
    }

    // Part B — single loop
    for ($k = 0; $k < count($arr); $k++) {
        // O(1) work per step
        $y = $arr[$k];
    }
}

// ─────────────────────────────────────────────────────────────
// COMPLEXITY ANALYSIS
// ─────────────────────────────────────────────────────────────

echo "--- Function structure ---" . PHP_EOL;
echo "Part A: nested loop (i from 0 to n, j from 0 to n)" . PHP_EOL;
echo "Part B: single loop (k from 0 to n)" . PHP_EOL;
echo PHP_EOL;

echo "--- Step-by-step analysis ---" . PHP_EOL;
echo "Part A: outer loop runs n times, inner loop runs n times per outer step" . PHP_EOL;
echo "        Cost of Part A = O(n) x O(n) = O(n²)" . PHP_EOL;
echo PHP_EOL;
echo "Part B: single loop runs n times, O(1) work per step" . PHP_EOL;
echo "        Cost of Part B = O(n)" . PHP_EOL;
echo PHP_EOL;

echo "--- Total complexity ---" . PHP_EOL;
echo "Total = Part A + Part B (sequential, not nested)" . PHP_EOL;
echo "      = O(n²) + O(n)" . PHP_EOL;
echo "      = O(n²)  ← dominant term wins" . PHP_EOL;
echo PHP_EOL;

echo "--- Why O(n²) is dominant ---" . PHP_EOL;
echo "As n grows large, n² grows much faster than n." . PHP_EOL;
echo "Example: n = 1000" . PHP_EOL;

$n = 1000;
echo "  O(n)  → " . number_format($n) . " operations" . PHP_EOL;
echo "  O(n²) → " . number_format($n * $n) . " operations" . PHP_EOL;
echo "O(n) becomes negligible next to O(n²) — we keep only the dominant term." . PHP_EOL;
echo PHP_EOL;

echo "--- Answer ---" . PHP_EOL;
echo "Time complexity : O(n²)" . PHP_EOL;
echo "Dominant term   : O(n²) — the nested loop part" . PHP_EOL;
echo "Space complexity: O(1)  — no extra data structure used" . PHP_EOL;
echo PHP_EOL;

echo "--- Key rule ---" . PHP_EOL;
echo "Sequential steps: ADD their complexities, then drop all but the dominant term." . PHP_EOL;
echo "Nested steps:     MULTIPLY their complexities." . PHP_EOL;
