<?php

/**
 * Day 07 — Revision Problem 04
 * Topic:   Trace a halving loop and state its complexity
 * Skill:   O(log n) recognition + apply log₂(n) formula
 *
 * Run: php problem-04-halving-trace.php
 */

// ─────────────────────────────────────────────────────────────
// THE PROBLEM
// ─────────────────────────────────────────────────────────────
//
// $n = 1024;
// $count = 0;
// while ($n > 1) {
//     $n = intdiv($n, 2);
//     $count++;
// }
// echo $count;
//
// Q1. What does $count print?
// Q2. How many steps does halving 1024 take?
// Q3. What general formula gives the number of steps?
// Q4. What is the time complexity of this loop?
//
// ─────────────────────────────────────────────────────────────

echo "=== Day 07 — Problem 04: Halving Trace ===" . PHP_EOL;
echo PHP_EOL;

// ─────────────────────────────────────────────────────────────
// STEP-BY-STEP TRACE
// ─────────────────────────────────────────────────────────────

$n     = 1024;
$count = 0;

echo "--- Step-by-step trace ---" . PHP_EOL;
echo "Start: n = " . $n . ", count = " . $count . PHP_EOL;
echo PHP_EOL;

$step = 1;
while ($n > 1) {
    $n = intdiv($n, 2);
    $count++;
    echo "Iteration " . $step . " → n = " . str_pad($n, 6) . "  count = " . $count . PHP_EOL;
    $step++;
}

echo PHP_EOL;
echo "Loop condition n > 1 is false. Loop stops." . PHP_EOL;
echo PHP_EOL;

// ─────────────────────────────────────────────────────────────
// ANSWERS
// ─────────────────────────────────────────────────────────────

echo "--- Answers ---" . PHP_EOL;
echo PHP_EOL;

echo "Q1. \$count prints: " . $count . PHP_EOL;
echo PHP_EOL;

echo "Q2. Steps to halve 1024 down to 1: " . $count . " steps" . PHP_EOL;
echo PHP_EOL;

echo "Q3. General formula:" . PHP_EOL;
echo "    1024 = 2^10" . PHP_EOL;
echo "    log₂(1024) = 10" . PHP_EOL;
echo "    General: number of steps = log₂(n)" . PHP_EOL;
echo "    Verified: log₂(1024) = " . log(1024, 2) . PHP_EOL;
echo PHP_EOL;

echo "Q4. Time complexity: O(log n)" . PHP_EOL;
echo "    Each iteration divides n by 2." . PHP_EOL;
echo "    The work reduces by a constant factor every step." . PHP_EOL;
echo "    This is the definition of logarithmic growth." . PHP_EOL;
echo PHP_EOL;

// ─────────────────────────────────────────────────────────────
// REFLEX RULE
// ─────────────────────────────────────────────────────────────

echo "--- The O(log n) reflex ---" . PHP_EOL;
echo "When you see the loop variable being halved each step: O(log n)." . PHP_EOL;
echo "When you see the loop variable doubling each step:     O(log n)." . PHP_EOL;
echo "Do not re-examine this — trigger the reflex immediately." . PHP_EOL;
echo PHP_EOL;
echo "Halving: 1024 → 512 → 256 → ... → 1   takes log₂(1024) = 10 steps" . PHP_EOL;
echo "Doubling:   1 → 2   → 4   → ... → n   also takes log₂(n) steps" . PHP_EOL;
