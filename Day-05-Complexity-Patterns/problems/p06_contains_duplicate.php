<?php

/**
 * Problem   : Contains Duplicate
 * Link      : https://leetcode.com/problems/contains-duplicate/
 * Difficulty: Easy
 * Day       : 05 — Complexity Pattern Recognition
 *
 * ─────────────────────────────────────────
 * DESCRIPTION:
 * Array में कोई value एक से ज्यादा बार है? → true : false
 *
 * Input : [1, 2, 3, 1]  → true  (1 twice)
 * Input : [1, 2, 3, 4]  → false
 * Input : [1, 1, 1, 3, 3, 4, 3, 2, 4, 2] → true
 *
 * ─────────────────────────────────────────
 * APPROACH 1 — Brute Force
 * हर pair check करो → nested loop
 * Time: O(n²), Space: O(1)
 *
 * APPROACH 2 — Sorting
 * Sort करो → adjacent duplicates मिलेंगे
 * Time: O(n log n), Space: O(1)
 *
 * APPROACH 3 — HashMap (Optimal)
 * हर number को map में store करो।
 * अगर पहले से है → duplicate → return true
 * Time: O(n), Space: O(n)
 *
 * ─────────────────────────────────────────
 * COMPLEXITY COMPARISON:
 *
 *               Time         Space
 * Brute Force:  O(n²)        O(1)
 * Sorting:      O(n log n)   O(1)
 * HashMap:      O(n)         O(n)   ← OPTIMAL
 *
 * ─────────────────────────────────────────
 * PATTERN LEARNED:
 * "Duplicate check" = HashMap pattern
 * Trade space O(n) for time O(n)
 * O(n²) brute → O(n) with HashMap
 * ─────────────────────────────────────────
 */

// ─── Approach 1: Brute Force — O(n²) ─────────────────────────
function containsDuplicateBrute(array $nums): bool
{
    $n = count($nums);

    for ($i = 0; $i < $n; $i++) {
        for ($j = $i + 1; $j < $n; $j++) {
            if ($nums[$i] === $nums[$j]) {
                return true;   // duplicate found!
            }
        }
    }

    // Time: O(n²) — nested loops check every pair
    // Space: O(1) — no extra storage
    return false;
}

// ─── Approach 2: Sort — O(n log n) ───────────────────────────
function containsDuplicateSort(array $nums): bool
{
    sort($nums);   // O(n log n)

    for ($i = 1; $i < count($nums); $i++) {
        if ($nums[$i] === $nums[$i - 1]) {
            return true;   // adjacent duplicate after sorting
        }
    }

    // Time: O(n log n) — sort dominates
    // Space: O(1) — in-place sort
    return false;
}

// ─── Approach 3: HashMap — O(n) OPTIMAL ──────────────────────
function containsDuplicateOptimal(array $nums): bool
{
    $seen = [];

    foreach ($nums as $num) {
        if (isset($seen[$num])) {
            return true;   // pehle se dekha hai → duplicate!
        }
        $seen[$num] = true;   // pehli baar dekha → store karo
    }

    // Time: O(n)  — single loop, O(1) per lookup
    // Space: O(n) — HashMap stores up to n elements
    return false;
}

// ─── Test Cases ───────────────────────────────────────────────
echo "=== Problem 6: Contains Duplicate ===" . PHP_EOL . PHP_EOL;

$tests = [
    [[1, 2, 3, 1], true,  "[1, 2, 3, 1]"],
    [[1, 2, 3, 4], false, "[1, 2, 3, 4]"],
    [[1, 1, 1, 3, 3, 4, 3, 2, 4, 2], true, "[1,1,1,3,3,4,3,2,4,2]"],
];

foreach ($tests as [$input, $expected, $label]) {
    $brute   = containsDuplicateBrute($input)   ? 'true' : 'false';
    $sort    = containsDuplicateSort($input)    ? 'true' : 'false';
    $optimal = containsDuplicateOptimal($input) ? 'true' : 'false';
    $exp     = $expected ? 'true' : 'false';

    echo "Input:    $label" . PHP_EOL;
    echo "Brute:    $brute | Sort: $sort | Optimal: $optimal" . PHP_EOL;
    echo "Expected: $exp" . PHP_EOL . PHP_EOL;
}

echo "--- Complexity Comparison ---" . PHP_EOL;
echo "Brute:   O(n²) time  | O(1) space" . PHP_EOL;
echo "Sort:    O(n log n)  | O(1) space" . PHP_EOL;
echo "Optimal: O(n) time   | O(n) space  ← Best for time" . PHP_EOL;
