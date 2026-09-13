<?php

/**
 * Day 08 — Arrays: Fundamentals
 * Problem 08 — Move Zeroes to End
 *
 * Task: Move all zeroes to the end of the array while maintaining 
 *       the relative order of the non-zero elements.
 *
 * Pattern: Write / Placement Pointer (Two Pointers)
 *
 * Time: O(n) — array is traversed twice at most (once to place non-zeros, once to fill zeroes)
 * Space: O(1) — in-place modification
 *
 * Important Learning:
 * - For this problem, Reverse Trick is not the right pattern. 
 * - Placement Pointer is the correct approach to maintain relative order.
 */

function moveZeroes(array &$arr): void
{
    $position = 0; // The Write/Placement Pointer

    // Step 1: Place all non-zero elements at the front
    foreach ($arr as $value) {
        if ($value != 0) {
            $arr[$position] = $value;
            $position++;
        }
    }

    // Step 2: Fill the remaining positions with zeroes
    while ($position < count($arr)) {
        $arr[$position] = 0;
        $position++;
    }
}

// ==========================================
// Test Cases
// ==========================================

// Test Case 1
$arr1 = [0, 1, 0, 3, 12];
moveZeroes($arr1);
echo "Test Case 1: ";
print_r($arr1);
// Expected: [1, 3, 12, 0, 0]

// Test Case 2
$arr2 = [1, 2, 3];
moveZeroes($arr2);
echo "Test Case 2: ";
print_r($arr2);
// Expected: [1, 2, 3]

// Test Case 3
$arr3 = [0, 0, 0];
moveZeroes($arr3);
echo "Test Case 3: ";
print_r($arr3);
// Expected: [0, 0, 0]
