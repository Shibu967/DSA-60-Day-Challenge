<?php

/**
 * Day 08 — Arrays: Fundamentals
 * Problem 07 — Find Duplicates (Brute Force)
 *
 * Task: Find all duplicate elements in an array.
 * Note: Intentionally using brute-force (nested loops) to demonstrate O(n²) cost.
 *       HashMap optimization is saved for a future phase.
 *
 * Pattern: Brute Force / Nested Traversal
 *
 * Time: O(n²) — for each element, we traverse the array again.
 *       (Plus `in_array()` which adds another O(n) scan)
 * Space: O(n) worst case for result array
 *
 * Important Learning:
 * - `in_array()` performs a linear search, meaning it is approximately O(n).
 */

function findDuplicatesBruteForce(array $arr): array
{
    $duplicates = [];

    foreach ($arr as $current) {
        // Avoid processing the same duplicate again.
        if (in_array($current, $duplicates)) {
            continue;
        }

        $count = 0;

        foreach ($arr as $element) {
            if ($current == $element) {
                $count++;
            }
        }

        if ($count > 1) {
            $duplicates[] = $current;
        }
    }

    return $duplicates;
}

// ==========================================
// Test Cases
// ==========================================

// Test Case 1
$arr1 = [1, 2, 3, 2, 4, 1];
echo "Test Case 1: ";
print_r(findDuplicatesBruteForce($arr1));
// Expected: [1, 2]

// Test Case 2
$arr2 = [1, 2, 3, 4];
echo "Test Case 2: ";
print_r(findDuplicatesBruteForce($arr2));
// Expected: []

// Test Case 3
$arr3 = [5, 5, 5];
echo "Test Case 3: ";
print_r(findDuplicatesBruteForce($arr3));
// Expected: [5]
