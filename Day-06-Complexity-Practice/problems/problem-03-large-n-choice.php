<?php

/**
 * Day 06 — Problem 03
 * Topic:   Large Constraint (n = 100,000) — O(n²) vs O(n)
 * Concept: Why O(n²) becomes impractical at large scale
 *
 * NOTE: We do NOT run a nested loop of 10 billion iterations.
 *       We use mathematical estimation to demonstrate the point,
 *       then run only the O(n) solution to confirm it is fast.
 *
 * Run: php problem-03-large-n-choice.php
 */

// ─────────────────────────────────────────────────────────────
// THE SETUP
// ─────────────────────────────────────────────────────────────
//
// Constraint: n = 100,000
//
// Task: Find the maximum sum of any subarray of size k.
// (This will be studied in depth on Day 11 — Sliding Window.)
//
// Today we focus ONLY on the complexity decision:
//   Brute force → O(n²)  → why does this fail at n = 100,000?
//   Optimal     → O(n)   → why is this required?
//
// ─────────────────────────────────────────────────────────────

echo "=== Problem 03: Large Constraint — n = 100,000 ===" . PHP_EOL;
echo PHP_EOL;

$n = 100_000;
$k = 3; // subarray size (kept small for the O(n) demo run)

// ─────────────────────────────────────────────────────────────
// STEP 1: Estimate operation counts WITHOUT running both
// ─────────────────────────────────────────────────────────────

$opsNSquared = $n * $n;               // O(n²): 10,000,000,000
$opsN        = $n;                    // O(n):  100,000

// Assume a machine does roughly 10^8 simple operations per second
$opsPerSecond = 100_000_000;

$timeNSquaredSec = $opsNSquared / $opsPerSecond;
$timeNSec        = $opsN        / $opsPerSecond;

echo "n = " . number_format($n) . PHP_EOL;
echo PHP_EOL;

echo "Algorithm A — O(n²)" . PHP_EOL;
echo "  Estimated operations: " . number_format($opsNSquared) . PHP_EOL;
echo "  Estimated time:       ~" . round($timeNSquaredSec) . " seconds" . PHP_EOL;
echo "  Verdict:              WILL TIME OUT on any online judge (limit is usually 1-2 sec)" . PHP_EOL;
echo PHP_EOL;

echo "Algorithm B — O(n)" . PHP_EOL;
echo "  Estimated operations: " . number_format($opsN) . PHP_EOL;
echo "  Estimated time:       < " . round($timeNSec * 1000, 3) . " ms" . PHP_EOL;
echo "  Verdict:              FAST — will pass comfortably" . PHP_EOL;
echo PHP_EOL;

// ─────────────────────────────────────────────────────────────
// STEP 2: Actually run the O(n) solution to confirm it is fast
// (We skip running O(n²) — it would take ~100 seconds)
// ─────────────────────────────────────────────────────────────

// Build a sample array of size n
$arr = [];
for ($i = 0; $i < $n; $i++) {
    $arr[] = rand(1, 100);
}

// O(n) approach: sliding window
// Start with the sum of the first window, then slide
$windowSum = array_sum(array_slice($arr, 0, $k)); // O(k)
$maxSum    = $windowSum;

$start = microtime(true);

for ($i = $k; $i < $n; $i++) {
    // Add the new element, remove the old one — O(1) per step
    $windowSum += $arr[$i] - $arr[$i - $k];
    if ($windowSum > $maxSum) {
        $maxSum = $windowSum;
    }
}

$elapsed = microtime(true) - $start;

// ─────────────────────────────────────────────────────────────
// OUTPUT
// ─────────────────────────────────────────────────────────────

echo "--- O(n) Solution Running (n = " . number_format($n) . ", k = " . $k . ") ---" . PHP_EOL;
echo "Max sum of subarray of size " . $k . ": " . $maxSum . PHP_EOL;
echo "Actual time taken: " . round($elapsed * 1000, 3) . " ms" . PHP_EOL;
echo PHP_EOL;

// ─────────────────────────────────────────────────────────────
// LESSON
// ─────────────────────────────────────────────────────────────

echo "--- Lesson ---" . PHP_EOL;
echo "Constraint: n = " . number_format($n) . PHP_EOL;
echo PHP_EOL;
echo "O(n²) would require " . number_format($opsNSquared) . " operations." . PHP_EOL;
echo "At 10^8 ops/sec, that is ~" . round($timeNSquaredSec) . " seconds." . PHP_EOL;
echo "Online judge limit: 1-2 seconds. O(n²) FAILS." . PHP_EOL;
echo PHP_EOL;
echo "O(n) requires only " . number_format($opsN) . " operations." . PHP_EOL;
echo "Actual time above: " . round($elapsed * 1000, 3) . " ms. O(n) PASSES." . PHP_EOL;
echo PHP_EOL;
echo "Key principle: When n >= 100,000, you almost always need O(n log n) or O(n)." . PHP_EOL;
echo "               Read the constraint BEFORE choosing your approach." . PHP_EOL;
