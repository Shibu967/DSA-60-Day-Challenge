<?php

/**
 * Day 08 — Arrays: Fundamentals
 * Problem 4 — Reverse Array In-Place
 *
 * Task: Reverse an array without creating a new array.
 *
 * Pattern: Two-Pointer Swap
 *
 * Time:  O(n) — we iterate through half the array, which is O(n/2) -> O(n)
 * Space: O(1) — swapping happens in-place
 */

function reverseArray(array &$arr): void
{
    $left = 0;
    $right = count($arr) - 1;

    while ($left < $right) {
        // Swap elements at left and right pointers
        $temp = $arr[$left];
        $arr[$left] = $arr[$right];
        $arr[$right] = $temp;

        // Move pointers towards the center
        $left++;
        $right--;
    }
}

// Example usage
$numbers = [10, 20, 30, 40, 50];

echo "Original: " . implode(", ", $numbers) . PHP_EOL;
reverseArray($numbers);
echo "Reversed: " . implode(", ", $numbers) . PHP_EOL;

// Output:
// Original: 10, 20, 30, 40, 50
// Reversed: 50, 40, 30, 20, 10
