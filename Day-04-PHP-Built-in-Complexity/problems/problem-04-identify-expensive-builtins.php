<?php

/**
 * Problem 04 — Identify Expensive Built-in Functions
 *
 * Platform  : Custom
 * Difficulty: Easy
 * Pattern   : Complexity analysis of PHP built-in usage
 *
 * Problem Statement:
 * Analyze the time complexity of each function below.
 * Identify which built-in functions are expensive and why.
 *
 * Snippet A — countDuplicatesA()
 * Snippet B — countDuplicatesB()
 *
 * Then implement the better version (B) from scratch.
 *
 * Expected:
 *   Snippet A — Time: O(n²), Space: O(1)  (in_array inside loop)
 *   Snippet B — Time: O(n),  Space: O(n)  (isset map)
 */

// ─────────────────────────────────────────────────────
// My Analysis
// ─────────────────────────────────────────────────────
//
// Snippet A — which built-in is expensive? Why O(n²)?
//
// Snippet B — why is isset() better here?
//
// KEY RULE: Never use in_array() inside a loop when you can use a map.

// ─────────────────────────────────────────────────────
// Snippet A — EXPENSIVE: in_array() inside loop → O(n²)
// ─────────────────────────────────────────────────────

function countDuplicatesA(array $arr): int
{
    $duplicates = 0;

    for ($i = 0; $i < count($arr); $i++) {
        for ($j = $i + 1; $j < count($arr); $j++) {
            if ($arr[$i] === $arr[$j]) {
                $duplicates++;
            }
        }
    }

    return $duplicates;
}

// ─────────────────────────────────────────────────────
// Snippet B — BETTER: frequency map with isset() → O(n)
// ─────────────────────────────────────────────────────

function countDuplicatesB(array $arr): int
{
    $freq       = [];
    $duplicates = 0;

    foreach ($arr as $value) {
        if (isset($freq[$value])) {
            $duplicates++;                  // seen before — count as duplicate occurrence
        }
        $freq[$value] = ($freq[$value] ?? 0) + 1;
    }

    return $duplicates;
}

// ─────────────────────────────────────────────────────
// Bonus — Identify complexity of these one-liners (comment your answers)
// ─────────────────────────────────────────────────────
//
// 1. array_push($arr, $x);           → Time: O(1), Space: O(1)
// 2. array_unshift($arr, $x);        → Time: O(n), Space: O(1)
// 3. array_search($x, $arr);         → Time: O(n), Space: O(1)
// 4. array_merge($a, $b);            → Time: O(n+m), Space: O(n+m) — creates new array

// ─────────────────────────────────────────────────────
// Test Cases
// ─────────────────────────────────────────────────────

echo "=== Problem 04: Identify Expensive Built-ins ===" . PHP_EOL;
echo PHP_EOL;

$tests = [
    [1, 2, 2, 3, 3, 3],
    [5, 5, 5],
    [1, 2, 3],
];

foreach ($tests as $arr) {
    echo "Input    : [" . implode(', ', $arr) . "]" . PHP_EOL;
    echo "Nested   : " . countDuplicatesA($arr) . " duplicate pairs (O(n²))" . PHP_EOL;
    echo "Map      : " . countDuplicatesB($arr) . " duplicate occurrences (O(n))" . PHP_EOL;
    echo PHP_EOL;
}

echo "Expensive built-ins to watch in loops:" . PHP_EOL;
echo "  in_array(), array_search()  → O(n) per call" . PHP_EOL;
echo "  array_shift(), array_unshift() → O(n) per call" . PHP_EOL;
echo "  sort() inside outer loop    → O(n² log n) disaster" . PHP_EOL;
