<?php

/**
 * Day 08 — Arrays: Fundamentals
 * Problem 09 — Remove Duplicates from Sorted Array
 *
 * Task: Given a sorted array, remove the duplicates in-place such that 
 *       each element appears only once and returns the new length.
 *
 * Pattern: Read Pointer + Write Pointer
 *
 * Time: O(n) — one pass through the array
 * Space: O(1) — in-place modification
 *
 * Important Learning:
 * - Since the array is sorted, duplicates are adjacent.
 * - This allows us to remove duplicates in O(n) without needing an extra HashMap.
 */

function removeDuplicates(array &$arr): int
{
    $n = count($arr);

    if ($n === 0) {
        return 0;
    }

    $write = 1;

    for ($i = 1; $i < $n; $i++) {
        if ($arr[$i] != $arr[$i - 1]) {
            $arr[$write] = $arr[$i];
            $write++;
        }
    }

    return $write;
}

// ==========================================
// Test Cases
// ==========================================

// Test Case 1
$arr1 = [1, 1, 2, 2, 3, 4, 4];
$uniqueCount1 = removeDuplicates($arr1);
echo "Test Case 1\n";
echo "Unique Count: " . $uniqueCount1 . PHP_EOL;
echo "Array: ";
print_r(array_slice($arr1, 0, $uniqueCount1));
// Expected: Unique Count 4, Array [1, 2, 3, 4]

// Test Case 2
$arr2 = [1, 1, 1];
$uniqueCount2 = removeDuplicates($arr2);
echo "Test Case 2\n";
echo "Unique Count: " . $uniqueCount2 . PHP_EOL;
echo "Array: ";
print_r(array_slice($arr2, 0, $uniqueCount2));
// Expected: Unique Count 1, Array [1]

// Test Case 3
$arr3 = [1, 2, 3, 4];
$uniqueCount3 = removeDuplicates($arr3);
echo "Test Case 3\n";
echo "Unique Count: " . $uniqueCount3 . PHP_EOL;
echo "Array: ";
print_r(array_slice($arr3, 0, $uniqueCount3));
// Expected: Unique Count 4, Array [1, 2, 3, 4]
