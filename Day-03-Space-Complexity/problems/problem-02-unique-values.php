<?php

/**
 * Problem 02 — Analyze Space Complexity: Get Unique Values
 *
 * Platform  : Custom
 * Difficulty: Easy
 * Pattern   : O(n) auxiliary space — two extra structures
 *
 * Problem Statement:
 * Analyze the auxiliary space complexity of getUniqueValues().
 *
 * Time  : O(n)
 * Auxiliary Space : O(n)
 */

// ─────────────────────────────────────────────────────
// My Analysis (Solved Independently)
// ─────────────────────────────────────────────────────
//
// Step 1: Extra data? Yes — $seen and $result
// Step 2: Fixed or grows with n? Both grow with n
// Step 3: Elements stored?
//   $seen   → up to n elements (one per unique value) → O(n)
//   $result → up to n elements (unique values)        → O(n)
// Step 4: 2D structure? No
// Step 5: Recursion? No
// Step 6: Multiple structures?
//   O(n) + O(n) = O(2n) = O(n) ← constant factor dropped
//
// Auxiliary Space = O(n)

// ─────────────────────────────────────────────────────
// Implementation
// ─────────────────────────────────────────────────────

function getUniqueValues(array $arr): array
{
    $seen   = [];   // grows up to n — O(n) space
    $result = [];   // grows up to n — O(n) space

    foreach ($arr as $val) {
        if (!isset($seen[$val])) {
            $seen[$val] = true;
            $result[]   = $val;
        }
    }

    return $result;
}

// ─────────────────────────────────────────────────────
// Test Cases
// ─────────────────────────────────────────────────────

echo "=== Problem 02: Get Unique Values ===" . PHP_EOL;
echo PHP_EOL;

$tests = [
    [1, 2, 2, 3, 3, 3, 4],
    [5, 5, 5, 5],
    [1, 2, 3],
    [],
];

foreach ($tests as $arr) {
    $result = getUniqueValues($arr);
    echo "Input:  [" . implode(', ', $arr) . "]" . PHP_EOL;
    echo "Output: [" . implode(', ', $result) . "]" . PHP_EOL;
    echo PHP_EOL;
}

echo "Time Complexity      : O(n)" . PHP_EOL;
echo "Auxiliary Space      : O(n) — \$seen O(n) + \$result O(n) = O(n)" . PHP_EOL;
