<?php

/**
 * Problem   : How Many Numbers Are Smaller Than the Current Number
 * Link      : https://leetcode.com/problems/how-many-numbers-are-smaller-than-the-current-number/
 * Difficulty: Easy
 * Day       : 05 — Complexity Pattern Recognition
 *
 * ─────────────────────────────────────────
 * DESCRIPTION:
 * हर number के लिए count करो कि उससे छोटे कितने numbers array में हैं।
 *
 * Input : [8, 1, 2, 2, 3]
 * Output: [4, 0, 1, 1, 3]
 *
 * Explanation:
 *   8 → {1,2,2,3} are smaller → 4
 *   1 → {} → 0
 *   2 → {1} → 1
 *   2 → {1} → 1
 *   3 → {1,2,2} → 3
 *
 * ─────────────────────────────────────────
 * APPROACH 1 — Brute Force
 * हर number के लिए पूरा array scan करो → nested loop → O(n²)
 *
 * APPROACH 2 — Optimal (Sort + Prefix Count)
 * Step 1: Sort a copy         → O(n log n)
 * Step 2: Build count map     → O(n)
 *         (sorted array में first occurrence का index = count of smaller)
 * Step 3: Map each original   → O(n)
 * Total: O(n log n)
 *
 * ─────────────────────────────────────────
 * COMPLEXITY COMPARISON:
 *
 * Brute Force:
 *   Time  : O(n²) — nested loops
 *   Space : O(n)  — result array
 *
 * Optimal:
 *   Time  : O(n log n) — dominated by sort
 *   Space : O(n)       — sorted copy + countMap
 *
 * ─────────────────────────────────────────
 * KEY INSIGHT FOR OPTIMAL:
 * Sorted array में किसी number का पहला index =
 * उससे छोटे numbers की count!
 *
 * [1, 1, 2, 2, 3] → sorted
 *  0  1  2  3  4  ← index
 *
 *  value 1 → index 0 → 0 smaller
 *  value 2 → index 2 → 2 smaller (1 and 1)
 *  value 3 → index 4 → 4 smaller
 *
 * Duplicates को correctly handle करने के लिए
 * पहली occurrence का index लो।
 * ─────────────────────────────────────────
 */

// ─── Approach 1: Brute Force — O(n²) ─────────────────────────
function smallerNumbersBrute(array $nums): array
{
    $result = [];

    foreach ($nums as $current) {
        $count = 0;
        foreach ($nums as $num) {
            if ($num < $current) {
                $count++;
            }
        }
        $result[] = $count;
    }

    // Time: O(n²) — nested loops
    // Space: O(n) — result array
    return $result;
}

// ─── Approach 2: Optimal — O(n log n) ────────────────────────
function smallerNumbersOptimal(array $nums): array
{
    // Step 1: Sort a copy — O(n log n)
    $sorted = $nums;
    sort($sorted);

    // Step 2: Build count map
    // Sorted array mein pehli occurrence ka index = count of smaller numbers
    // O(n) — single loop
    $countMap = [];
    foreach ($sorted as $index => $value) {
        // isset check: agar pehle se store hai, skip (duplicate handle)
        if (!isset($countMap[$value])) {
            $countMap[$value] = $index;
        }
    }

    // Step 3: Map each original number to its count — O(n)
    $result = [];
    foreach ($nums as $num) {
        $result[] = $countMap[$num];
    }

    // Time: O(n log n) — sort dominates
    // Space: O(n) — sorted copy + countMap
    return $result;
}

// ─── Test Cases ───────────────────────────────────────────────
echo "=== Problem 5: How Many Numbers Are Smaller ===" . PHP_EOL . PHP_EOL;

$test1 = [8, 1, 2, 2, 3];
echo "Input: [8, 1, 2, 2, 3]" . PHP_EOL;
echo "Brute:   " . implode(", ", smallerNumbersBrute($test1))   . PHP_EOL;
echo "Optimal: " . implode(", ", smallerNumbersOptimal($test1)) . PHP_EOL;
echo "Expected: 4, 0, 1, 1, 3" . PHP_EOL . PHP_EOL;

$test2 = [6, 5, 4, 8];
echo "Input: [6, 5, 4, 8]" . PHP_EOL;
echo "Optimal: " . implode(", ", smallerNumbersOptimal($test2)) . PHP_EOL;
echo "Expected: 2, 1, 0, 3" . PHP_EOL . PHP_EOL;

$test3 = [7, 7, 7, 7];
echo "Input: [7, 7, 7, 7] (all same — duplicate test)" . PHP_EOL;
echo "Optimal: " . implode(", ", smallerNumbersOptimal($test3)) . PHP_EOL;
echo "Expected: 0, 0, 0, 0" . PHP_EOL;

echo PHP_EOL;
echo "--- Complexity Comparison ---" . PHP_EOL;
echo "Brute:   O(n²) time, O(n) space" . PHP_EOL;
echo "Optimal: O(n log n) time, O(n) space" . PHP_EOL;
