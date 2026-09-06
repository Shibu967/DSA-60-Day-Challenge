<?php

/**
 * Problem 02 — Stack with push/pop vs shift (Wrong Queue Pattern)
 *
 * Platform  : Custom
 * Difficulty: Easy
 * Pattern   : O(1) stack ops vs O(n) array_shift
 *
 * Problem Statement:
 * Reverse an array using stack operations only.
 *
 *   Correct — use array_push() + array_pop()  → O(n) total time, O(n) space for stack
 *   Wrong   — use array_shift() in a loop     → O(n²) total time (shift re-indexes each time)
 *
 * Implement reverseWithStack() and analyze why array_shift() inside a loop is expensive.
 *
 * Expected Complexity:
 *   reverseWithStack()      — Time: O(n), Space: O(n)
 *   reverseWithShift (demo) — Time: O(n²), Space: O(1) extra
 */

// ─────────────────────────────────────────────────────
// My Approach
// ─────────────────────────────────────────────────────
//
// Why is array_pop() O(1) but array_shift() O(n)?
//
// Total cost of n shifts in a loop = ?

// ─────────────────────────────────────────────────────
// Correct — Stack using push + pop (O(n) time)
// ─────────────────────────────────────────────────────

function reverseWithStack(array $arr): array
{
    $stack = [];

    foreach ($arr as $value) {
        array_push($stack, $value);           // O(1) amortized — add to back
    }

    $reversed = [];
    while (count($stack) > 0) {
        $reversed[] = array_pop($stack);      // O(1) — remove from back
    }

    return $reversed;
}

// ─────────────────────────────────────────────────────
// Wrong — Using array_shift in a loop (O(n²) time)
// ─────────────────────────────────────────────────────

function reverseWithShift(array $arr): array
{
    $reversed = [];

    while (count($arr) > 0) {
        array_unshift($reversed, array_shift($arr));  // both O(n) — O(n²) total
    }

    return $reversed;
}

// ─────────────────────────────────────────────────────
// Test Cases
// ─────────────────────────────────────────────────────

echo "=== Problem 02: Stack push/pop vs array_shift ===" . PHP_EOL;
echo PHP_EOL;

$input = [10, 20, 30, 40, 50];

echo "Input: [" . implode(', ', $input) . "]" . PHP_EOL;
echo PHP_EOL;

echo "reverseWithStack : [" . implode(', ', reverseWithStack($input)) . "]" . PHP_EOL;
echo "  Time: O(n)  — n pushes + n pops, each O(1)" . PHP_EOL;
echo PHP_EOL;

echo "reverseWithShift : [" . implode(', ', reverseWithShift($input)) . "]" . PHP_EOL;
echo "  Time: O(n²) — n iterations, each shift + unshift is O(n)" . PHP_EOL;
echo PHP_EOL;

echo "Rule: Use push/pop for stack (LIFO). Avoid shift/unshift in loops on large arrays." . PHP_EOL;
