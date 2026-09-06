<?php

/**
 * Problem 03 — sort() Cost + Finding a Duplicate
 *
 * Platform  : Custom
 * Difficulty: Easy
 * Pattern   : O(n log n) sort, then O(n) linear scan
 *
 * Problem Statement:
 * Given an array of integers, return the first duplicate value found.
 * If no duplicate exists, return null.
 *
 * Approach:
 *   1. sort($arr)           — O(n log n)
 *   2. Scan adjacent pairs    — O(n)
 *   Total time: O(n log n)
 *
 * Also analyze: why is sort() expensive? When would a HashMap (isset) be better?
 *
 * Expected Complexity:
 *   Time  : O(n log n)
 *   Space : O(1) auxiliary if sorting in place (PHP sort modifies the array)
 */

// ─────────────────────────────────────────────────────
// My Approach
// ─────────────────────────────────────────────────────
//
// Why does sort() cost O(n log n)?
//
// Alternative with isset() map — Time O(n), Space O(n). When is that better?

// ─────────────────────────────────────────────────────
// Implementation — sort + adjacent scan
// ─────────────────────────────────────────────────────

function findFirstDuplicateWithSort(array $arr): ?int
{
    if (count($arr) < 2) {
        return null;
    }

    sort($arr);                             // O(n log n) — modifies array in place

    for ($i = 1; $i < count($arr); $i++) {
        if ($arr[$i] === $arr[$i - 1]) {    // O(n) scan after sort
            return $arr[$i];
        }
    }

    return null;
}

// ─────────────────────────────────────────────────────
// Alternative — HashMap with isset() (for comparison)
// ─────────────────────────────────────────────────────

function findFirstDuplicateWithMap(array $arr): ?int
{
    $seen = [];

    foreach ($arr as $value) {
        if (isset($seen[$value])) {         // O(1) avg check
            return $value;
        }
        $seen[$value] = true;               // O(n) space total
    }

    return null;
}

// ─────────────────────────────────────────────────────
// Test Cases
// ─────────────────────────────────────────────────────

echo "=== Problem 03: sort() + Find Duplicate ===" . PHP_EOL;
echo PHP_EOL;

$tests = [
    [3, 1, 4, 1, 5],
    [7, 8, 9],
    [2, 2],
    [],
];

foreach ($tests as $arr) {
    $copy = $arr;
    $dupSort = findFirstDuplicateWithSort($copy);
    $dupMap  = findFirstDuplicateWithMap($arr);

    echo "Input : [" . implode(', ', $arr) . "]" . PHP_EOL;
    echo "Sort  : " . ($dupSort === null ? 'null' : $dupSort) . PHP_EOL;
    echo "Map   : " . ($dupMap === null ? 'null' : $dupMap) . PHP_EOL;
    echo PHP_EOL;
}

echo "Sort approach — Time: O(n log n) | Space: O(1) aux (in-place sort)" . PHP_EOL;
echo "Map approach  — Time: O(n)       | Space: O(n)" . PHP_EOL;
echo "sort() is O(n log n) — avoid calling it inside a loop over growing data." . PHP_EOL;
