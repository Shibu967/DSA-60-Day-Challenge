<?php

/**
 * Problem 04 — In-Place vs Extra Space: Double All Elements
 *
 * Platform  : Custom
 * Difficulty: Easy
 * Pattern   : In-place O(1) space vs extra-array O(n) space
 *
 * Problem Statement:
 * Multiply every element of the array by 2.
 * Solve it two ways and compare the auxiliary space.
 *
 * Version A — In-place  : Time O(n), Auxiliary Space O(1)
 * Version B — Extra Space: Time O(n), Auxiliary Space O(n)
 */

// ─────────────────────────────────────────────────────
// Version A — In-Place (O(1) Auxiliary Space)
// ─────────────────────────────────────────────────────
//
// WHY O(1): Only $key and $value are used — fixed variables.
// Original array is modified directly via reference (&$arr).
// No new array is created.

function doubleInPlace(array &$arr): void
{
    foreach ($arr as $key => $value) {
        $arr[$key] = $value * 2;    // modify original array at index $key
    }
    // No return — original array is modified via reference
}

// ─────────────────────────────────────────────────────
// Version B — Extra Space (O(n) Auxiliary Space)
// ─────────────────────────────────────────────────────
//
// WHY O(n): $result is a new array that grows to size n.
// Original array is NOT modified.

function doubleWithExtra(array $arr): array
{
    $result = [];                   // new array — grows to size n

    foreach ($arr as $value) {
        $result[] = $value * 2;     // store doubled value in new array
    }

    return $result;
}

// ─────────────────────────────────────────────────────
// Test Cases
// ─────────────────────────────────────────────────────

$original = [1, 2, 3, 4, 5];

echo "=== Problem 04: Double All Elements ===" . PHP_EOL;
echo PHP_EOL;

// Version A — In-place
$arrA = [1, 2, 3, 4, 5];
doubleInPlace($arrA);
echo "Version A — In-place  : [" . implode(', ', $arrA) . "]" . PHP_EOL;
echo "  Time: O(n) | Auxiliary Space: O(1)" . PHP_EOL;
echo PHP_EOL;

// Version B — Extra space
$arrB = [1, 2, 3, 4, 5];
$resultB = doubleWithExtra($arrB);
echo "Version B — Extra space: [" . implode(', ', $resultB) . "]" . PHP_EOL;
echo "  Original unchanged  : [" . implode(', ', $arrB) . "]" . PHP_EOL;
echo "  Time: O(n) | Auxiliary Space: O(n)" . PHP_EOL;
echo PHP_EOL;

echo "=== Comparison ===" . PHP_EOL;
echo "Both versions produce the same output." . PHP_EOL;
echo "Version A modifies input directly  → O(1) auxiliary space" . PHP_EOL;
echo "Version B creates a new array      → O(n) auxiliary space" . PHP_EOL;
echo "Same TIME complexity (O(n)), different SPACE complexity." . PHP_EOL;
