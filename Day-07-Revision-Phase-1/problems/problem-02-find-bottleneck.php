<?php

/**
 * Day 07 — Revision Problem 02
 * Topic:   Find the bottleneck and fix it
 * Skill:   Recognize hidden O(n) inside a loop — rewrite to O(n)
 *
 * Run: php problem-02-find-bottleneck.php
 */

// ─────────────────────────────────────────────────────────────
// THE PROBLEM
// ─────────────────────────────────────────────────────────────
//
// The function below checks if an array has any duplicate values.
//
// function hasDuplicate(array $arr): bool {
//     for ($i = 0; $i < count($arr); $i++) {
//         if (in_array($arr[$i], array_slice($arr, $i + 1))) {
//             return true;
//         }
//     }
//     return false;
// }
//
// Q1. What is the current time complexity?
// Q2. What is the bottleneck?
// Q3. Rewrite it to run in O(n).
//
// ─────────────────────────────────────────────────────────────

echo "=== Day 07 — Problem 02: Find the Bottleneck ===" . PHP_EOL;
echo PHP_EOL;

// ─────────────────────────────────────────────────────────────
// SLOW VERSION — O(n²)
// ─────────────────────────────────────────────────────────────

function hasDuplicateSlow(array $arr): bool
{
    for ($i = 0; $i < count($arr); $i++) {
        // in_array() scans the remaining array — O(n) per call
        // array_slice() also creates a new sub-array — O(n) per call
        if (in_array($arr[$i], array_slice($arr, $i + 1))) {
            return true;
        }
    }
    return false;
}

// ─────────────────────────────────────────────────────────────
// COMPLEXITY ANALYSIS OF SLOW VERSION
// ─────────────────────────────────────────────────────────────

echo "--- Slow version analysis ---" . PHP_EOL;
echo "Outer loop         : O(n)  — visits each element once" . PHP_EOL;
echo "array_slice()      : O(n)  — creates a new sub-array each time" . PHP_EOL;
echo "in_array()         : O(n)  — scans the sub-array one element at a time" . PHP_EOL;
echo PHP_EOL;
echo "Total = O(n) x O(n) = O(n²)" . PHP_EOL;
echo PHP_EOL;
echo "Bottleneck: in_array() + array_slice() inside the loop." . PHP_EOL;
echo "Both are O(n) per call. They look like simple function calls" . PHP_EOL;
echo "but PHP runs a full scan internally each time." . PHP_EOL;
echo PHP_EOL;

// ─────────────────────────────────────────────────────────────
// FAST VERSION — O(n)
// ─────────────────────────────────────────────────────────────

function hasDuplicateFast(array $arr): bool
{
    $seen = [];

    foreach ($arr as $value) {
        if (isset($seen[$value])) {  // O(1) — PHP key lookup in hash map
            return true;
        }
        $seen[$value] = true;        // O(1) — insert key into hash map
    }

    return false;
}

echo "--- Fast version analysis ---" . PHP_EOL;
echo "One loop           : O(n)  — visits each element exactly once" . PHP_EOL;
echo "isset(\$seen[\$v])   : O(1)  — hash map key lookup, no scanning" . PHP_EOL;
echo "\$seen[\$v] = true   : O(1)  — hash map key insert" . PHP_EOL;
echo PHP_EOL;
echo "Total = O(n) x O(1) = O(n)" . PHP_EOL;
echo PHP_EOL;

// ─────────────────────────────────────────────────────────────
// TEST BOTH VERSIONS
// ─────────────────────────────────────────────────────────────

$withDuplicate    = [4, 1, 7, 3, 7, 9];
$withoutDuplicate = [1, 2, 3, 4, 5];

echo "--- Test results ---" . PHP_EOL;
echo "Array with duplicate [4,1,7,3,7,9]:" . PHP_EOL;
echo "  Slow: " . (hasDuplicateSlow($withDuplicate) ? 'true' : 'false') . PHP_EOL;
echo "  Fast: " . (hasDuplicateFast($withDuplicate) ? 'true' : 'false') . PHP_EOL;
echo PHP_EOL;
echo "Array without duplicate [1,2,3,4,5]:" . PHP_EOL;
echo "  Slow: " . (hasDuplicateSlow($withoutDuplicate) ? 'true' : 'false') . PHP_EOL;
echo "  Fast: " . (hasDuplicateFast($withoutDuplicate) ? 'true' : 'false') . PHP_EOL;
echo PHP_EOL;

echo "--- Key lesson ---" . PHP_EOL;
echo "in_array() does NOT look like a loop in the code." . PHP_EOL;
echo "But PHP runs a full scan internally. It is O(n)." . PHP_EOL;
echo "Placed inside a loop → hidden O(n²)." . PHP_EOL;
echo "Rule: Replace in_array() inside loops with isset() on a seen-array." . PHP_EOL;
