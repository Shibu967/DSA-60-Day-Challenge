<?php

/**
 * Problem 04 — If/Else Branch Complexity
 *
 * Platform  : Custom
 * Difficulty: Easy
 * Pattern   : If/Else branch analysis
 *
 * Problem Statement:
 * Analyze the BEST CASE and WORST CASE time complexity.
 *
 * Code:
 *   if ($n % 2 === 0) {
 *       for ($i = 0; $i < $n; $i++) { echo $i; }        // O(n)
 *   } else {
 *       for ($i = 0; $i < $n; $i++) {
 *           for ($j = 0; $j < $n; $j++) { echo $i+$j; } // O(n²)
 *       }
 *   }
 *
 * Best Case  : O(n)
 * Worst Case : O(n²)
 */

// ─────────────────────────────────────────────────────
// My Analysis (Solved Independently)
// ─────────────────────────────────────────────────────
//
// KEY RULE: In an if/else block, only ONE branch executes.
// We analyze each branch separately.
//
// if branch   → single loop → O(n)   ← cheaper
// else branch → nested loop → O(n²)  ← more expensive
//
// Best Case  = most favorable input = n is even → if executes → O(n)
// Worst Case = most unfavorable input = n is odd  → else executes → O(n²)
//
// By convention, Big O without a case specified = worst case = O(n²)

// ─────────────────────────────────────────────────────
// Dry Run
// ─────────────────────────────────────────────────────
// n = 4 (even) → if branch → loop runs 4 times → O(n) ✅
// n = 5 (odd)  → else branch → nested loop runs 25 times → O(n²) ✅

// ─────────────────────────────────────────────────────
// Demonstration
// ─────────────────────────────────────────────────────

function analyzeIfElse(int $n): array
{
    $steps = 0;
    $branch = '';

    if ($n % 2 === 0) {
        $branch = 'if (O(n))';
        for ($i = 0; $i < $n; $i++) {
            $steps++;
        }
    } else {
        $branch = 'else (O(n²))';
        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $n; $j++) {
                $steps++;
            }
        }
    }

    return ['branch' => $branch, 'steps' => $steps];
}

echo "=== Problem 04: If/Else Branch Complexity ===" . PHP_EOL;
echo PHP_EOL;

foreach ([4, 5, 10, 11] as $n) {
    $result = analyzeIfElse($n);
    echo "n={$n}: {$result['branch']} → {$result['steps']} steps" . PHP_EOL;
}

echo PHP_EOL;
echo "Best Case  : O(n)  ← n is even, if branch executes" . PHP_EOL;
echo "Worst Case : O(n²) ← n is odd,  else branch executes" . PHP_EOL;
echo "By convention (no case specified) : O(n²)" . PHP_EOL;
