<?php

/**
 * Day 07 — Revision Problem 03
 * Topic:   Constraint → algorithm selection with justification
 * Skill:   Use n to calculate operation counts and accept/reject each approach
 *
 * Run: php problem-03-constraint-algorithm-selection.php
 */

// ─────────────────────────────────────────────────────────────
// THE PROBLEM
// ─────────────────────────────────────────────────────────────
//
// You receive a problem. The constraint says n ≤ 10⁶.
// You have three candidate algorithms:
//   A) O(n²)
//   B) O(n log n)
//   C) O(n)
//
// Q1. Which ones are acceptable?
// Q2. Which ones will time out?
// Q3. Justify your answer with operation counts.
//
// ─────────────────────────────────────────────────────────────

echo "=== Day 07 — Problem 03: Constraint → Algorithm Selection ===" . PHP_EOL;
echo PHP_EOL;

$n = 1_000_000;

echo "Constraint: n = " . number_format($n) . PHP_EOL;
echo PHP_EOL;

// ─────────────────────────────────────────────────────────────
// CALCULATE OPERATION COUNTS
// ─────────────────────────────────────────────────────────────

$opsN2    = (float)$n * $n;
$opsNLogN = (float)$n * log($n, 2);
$opsN     = (float)$n;

echo "--- Operation count estimates ---" . PHP_EOL;
echo "O(n²)     → " . number_format($opsN2)    . " operations" . PHP_EOL;
echo "O(n log n)→ " . number_format($opsNLogN) . " operations (approx)" . PHP_EOL;
echo "O(n)      → " . number_format($opsN)     . " operations" . PHP_EOL;
echo PHP_EOL;

// ─────────────────────────────────────────────────────────────
// VERDICT — with justification
// ─────────────────────────────────────────────────────────────

echo "--- Verdict ---" . PHP_EOL;
echo PHP_EOL;

echo "O(n²) — " . number_format($opsN2) . " operations" . PHP_EOL;
echo "  → Will time out in most practical situations." . PHP_EOL;
echo "  → At typical judge speeds (~10⁸ ops/sec), this would take" . PHP_EOL;
echo "     roughly " . number_format($opsN2 / 1e8, 0) . " seconds. Not acceptable." . PHP_EOL;
echo "  → REJECT for n = 10⁶" . PHP_EOL;
echo PHP_EOL;

echo "O(n log n) — " . number_format($opsNLogN) . " operations" . PHP_EOL;
echo "  → Fast enough. About 20 million operations." . PHP_EOL;
echo "  → Runs in well under 1 second at typical speeds." . PHP_EOL;
echo "  → ACCEPT for n = 10⁶" . PHP_EOL;
echo PHP_EOL;

echo "O(n) — " . number_format($opsN) . " operations" . PHP_EOL;
echo "  → Very fast. 1 million operations." . PHP_EOL;
echo "  → Easily within time limits." . PHP_EOL;
echo "  → ACCEPT for n = 10⁶" . PHP_EOL;
echo PHP_EOL;

// ─────────────────────────────────────────────────────────────
// CONSTRAINT TABLE — practical reference
// ─────────────────────────────────────────────────────────────

echo "--- Constraint reference table ---" . PHP_EOL;
echo "These are practical guidelines, not absolute rules." . PHP_EOL;
echo "Always verify against the actual problem and time limit." . PHP_EOL;
echo PHP_EOL;
echo "n <= 20          → brute force often acceptable" . PHP_EOL;
echo "n <= 1,000       → O(n²) may be practical" . PHP_EOL;
echo "n <= 100,000     → usually need O(n log n) or O(n)" . PHP_EOL;
echo "n <= 1,000,000   → O(n) or O(n log n) generally preferred" . PHP_EOL;
echo PHP_EOL;

echo "--- Key lesson ---" . PHP_EOL;
echo "When analyzing constraints, always list ALL options with operation counts." . PHP_EOL;
echo "Do not stop at one acceptable answer — give the complete picture." . PHP_EOL;
echo "There is no universal good or bad Big-O without a specific constraint." . PHP_EOL;
