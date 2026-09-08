<?php

/**
 * Day 06 — Problem 04
 * Topic:   Small n — O(n²) vs O(n³) practicality
 * Concept: Even at small n, lower complexity is generally preferable.
 *          But both may be practically fine — simplicity matters too.
 *
 * Run: php problem-04-small-n-practicality.php
 */

// ─────────────────────────────────────────────────────────────
// THE SETUP
// ─────────────────────────────────────────────────────────────
//
// Constraint: n = 10
//
// You have two candidate algorithms:
//   Algorithm A: O(n²)  — simpler, nested loop
//   Algorithm B: O(n³)  — more complex, triple nested loop
//
// Both produce the same correct result.
// At n = 10: is there a meaningful difference?
//
// Task: Find the longest subarray where all pairs sum to >= threshold.
// (A made-up task — focus is on the complexity comparison, not the problem itself.)
//
// ─────────────────────────────────────────────────────────────

echo "=== Problem 04: Small n = 10 — O(n²) vs O(n³) ===" . PHP_EOL;
echo PHP_EOL;

$arr       = [3, 1, 7, 4, 9, 2, 6, 8, 5, 10];
$n         = count($arr);
$threshold = 10;

echo "Array:     [" . implode(', ', $arr) . "]" . PHP_EOL;
echo "n:         " . $n . PHP_EOL;
echo "Threshold: " . $threshold . PHP_EOL;
echo PHP_EOL;

// ─────────────────────────────────────────────────────────────
// ESTIMATE: How many operations does each approach take at n = 10?
// ─────────────────────────────────────────────────────────────

$opsNSquared = $n * $n;           // 100
$opsNCubed   = $n * $n * $n;      // 1,000

echo "Operation estimates:" . PHP_EOL;
echo "  O(n²) → n² = " . $opsNSquared . " operations" . PHP_EOL;
echo "  O(n³) → n³ = " . $opsNCubed   . " operations" . PHP_EOL;
echo PHP_EOL;
echo "At n = 10, both are tiny. Either is fast enough." . PHP_EOL;
echo PHP_EOL;

// ─────────────────────────────────────────────────────────────
// ALGORITHM A — O(n²)
// Check every pair (i, j) and see if their sum >= threshold.
// Count pairs that satisfy this.
// ─────────────────────────────────────────────────────────────

$pairsAbove = 0;
$countA     = 0;

for ($i = 0; $i < $n; $i++) {
    for ($j = $i + 1; $j < $n; $j++) {
        $countA++;
        if ($arr[$i] + $arr[$j] >= $threshold) {
            $pairsAbove++;
        }
    }
}

echo "--- Algorithm A — O(n²): count pairs with sum >= " . $threshold . " ---" . PHP_EOL;
echo "Pairs found:        " . $pairsAbove . PHP_EOL;
echo "Iterations run:     " . $countA     . PHP_EOL;
echo PHP_EOL;

// ─────────────────────────────────────────────────────────────
// ALGORITHM B — O(n³)
// For every starting index i, try all subarrays starting at i.
// For each subarray [i..j], check all pairs inside it.
// Count subarrays where ALL pairs sum >= threshold.
//
// This is a more complex (and more expensive) approach to a
// related but harder version of the same problem.
// ─────────────────────────────────────────────────────────────

$validSubarrays = 0;
$countB         = 0;

for ($i = 0; $i < $n; $i++) {
    for ($j = $i; $j < $n; $j++) {
        // Check all pairs inside subarray arr[i..j]
        $allPairsValid = true;
        for ($p = $i; $p <= $j && $allPairsValid; $p++) {
            for ($q = $p + 1; $q <= $j; $q++) {
                $countB++;
                if ($arr[$p] + $arr[$q] < $threshold) {
                    $allPairsValid = false;
                    break;
                }
            }
        }
        if ($allPairsValid && $j > $i) {
            $validSubarrays++;
        }
    }
}

echo "--- Algorithm B — O(n³/n⁴): subarrays where all pairs sum >= " . $threshold . " ---" . PHP_EOL;
echo "Valid subarrays:    " . $validSubarrays . PHP_EOL;
echo "Iterations run:     " . $countB         . PHP_EOL;
echo PHP_EOL;

// ─────────────────────────────────────────────────────────────
// LESSON
// ─────────────────────────────────────────────────────────────

echo "--- Lesson ---" . PHP_EOL;
echo "At n = " . $n . ":" . PHP_EOL;
echo "  O(n²) ran in " . $countA . " iterations." . PHP_EOL;
echo "  O(n³) (approx) ran in " . $countB . " iterations." . PHP_EOL;
echo PHP_EOL;
echo "Both completed instantly. At this scale, both are practical." . PHP_EOL;
echo PHP_EOL;
echo "However, O(n²) is STILL preferable because:" . PHP_EOL;
echo "  1. It is simpler to write and understand." . PHP_EOL;
echo "  2. It will remain fast even if n grows slightly larger." . PHP_EOL;
echo "  3. Lower complexity = more future-proof." . PHP_EOL;
echo PHP_EOL;
echo "The important nuance: 'practical' does not mean 'equally good'." . PHP_EOL;
echo "When two approaches both fit within constraints, choose the simpler" . PHP_EOL;
echo "and lower-complexity one. The O(n²) solution is better here." . PHP_EOL;
echo PHP_EOL;
echo "Key principle: Lower Big-O is generally preferable." . PHP_EOL;
echo "               For tiny n, both may run fast — but favour the simpler, lower approach." . PHP_EOL;
