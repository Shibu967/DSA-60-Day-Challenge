<?php

/**
 * Day 06 — Problem 02
 * Topic:   Compare O(n²) vs O(n log n) at n = 1000
 * Concept: Estimating operation counts to understand which algorithm is preferable
 *
 * NOTE: We do NOT actually run a billion operations here.
 *       We calculate and compare the estimated counts mathematically.
 *
 * Run: php problem-02-compare-complexities.php
 */

// ─────────────────────────────────────────────────────────────
// THE SETUP
// ─────────────────────────────────────────────────────────────
//
// Constraint: n = 1000
//
// You have two candidate algorithms:
//   Algorithm A: O(n²)       — e.g., a brute force nested loop
//   Algorithm B: O(n log n)  — e.g., a sort-based approach
//
// Which one is practical?
//
// ─────────────────────────────────────────────────────────────

echo "=== Problem 02: Compare O(n²) vs O(n log n) at n = 1000 ===" . PHP_EOL;
echo PHP_EOL;

$n = 1000;

// ─────────────────────────────────────────────────────────────
// ESTIMATE OPERATION COUNTS (mathematical, not actual execution)
// ─────────────────────────────────────────────────────────────

// O(n²): n × n operations
$opsNSquared = $n * $n;

// O(n log n): n × log₂(n) operations (approximate)
// log₂(1000) ≈ 9.97 ≈ 10
$log2_n      = log($n, 2);
$opsNLogN    = (int) round($n * $log2_n);

echo "n = " . $n . PHP_EOL;
echo PHP_EOL;
echo "Algorithm A — O(n²)      estimated operations: " . number_format($opsNSquared) . PHP_EOL;
echo "Algorithm B — O(n log n) estimated operations: " . number_format($opsNLogN)    . PHP_EOL;
echo PHP_EOL;

// ─────────────────────────────────────────────────────────────
// SMALL DEMONSTRATION: actually run both on a modest input
// to show the difference is real (not just theoretical)
// We use n = 1000 but lightweight inner work (just counting)
// ─────────────────────────────────────────────────────────────

// Algorithm A simulation: nested loop counting operations
$countA = 0;
for ($i = 0; $i < $n; $i++) {
    for ($j = 0; $j < $n; $j++) {
        $countA++; // lightweight work only — no heavy computation
    }
}

// Algorithm B simulation: PHP sort() on a random array
$arr = range(1, $n);
shuffle($arr);

$startB  = microtime(true);
sort($arr);            // O(n log n) internally
$timeB   = microtime(true) - $startB;

$startA  = null; // Algorithm A timing
$startA  = microtime(true);
// Re-run the nested count to measure time
$dummy = 0;
for ($i = 0; $i < $n; $i++) {
    for ($j = 0; $j < $n; $j++) {
        $dummy++;
    }
}
$timeA = microtime(true) - $startA;

// ─────────────────────────────────────────────────────────────
// OUTPUT
// ─────────────────────────────────────────────────────────────

echo "--- Actual measured results (n = " . $n . ") ---" . PHP_EOL;
echo "Algorithm A — O(n²)      actual iterations: " . number_format($countA) . PHP_EOL;
echo "Algorithm A — O(n²)      time: "              . round($timeA * 1000, 3) . " ms" . PHP_EOL;
echo PHP_EOL;
echo "Algorithm B — O(n log n) actual sort (PHP built-in)" . PHP_EOL;
echo "Algorithm B — O(n log n) time: "              . round($timeB * 1000, 3) . " ms" . PHP_EOL;
echo PHP_EOL;

// ─────────────────────────────────────────────────────────────
// LESSON
// ─────────────────────────────────────────────────────────────

echo "--- Lesson ---" . PHP_EOL;
echo "At n = 1000:" . PHP_EOL;
echo "  O(n²)      requires ~" . number_format($opsNSquared) . " operations" . PHP_EOL;
echo "  O(n log n) requires ~" . number_format($opsNLogN)    . " operations" . PHP_EOL;
echo PHP_EOL;

$ratio = round($opsNSquared / $opsNLogN);
echo "  O(n²) does roughly " . $ratio . "x more work than O(n log n)" . PHP_EOL;
echo PHP_EOL;
echo "At n = 1000, O(n²) is still manageable (1 million ops)." . PHP_EOL;
echo "But O(n log n) is ~" . $ratio . "x more efficient." . PHP_EOL;
echo PHP_EOL;
echo "The gap gets much worse as n grows larger." . PHP_EOL;
echo "Conclusion: prefer O(n log n) when you can, even at n = 1000." . PHP_EOL;
echo PHP_EOL;
echo "Key principle: Bigger n → bigger difference between complexities." . PHP_EOL;
echo "               Always choose the simpler approach that fits the constraint." . PHP_EOL;
