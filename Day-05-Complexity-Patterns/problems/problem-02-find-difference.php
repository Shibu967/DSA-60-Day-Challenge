<?php

/**
 * Problem 02 — Find the Difference of Two Arrays
 *
 * Platform  : LeetCode
 * Difficulty: Easy
 * Pattern   : HashMap optimization — in_array() trap → O(1) lookup
 *
 * Problem Statement:
 * Given two arrays nums1 and nums2, return a list of two arrays:
 *   [0] — unique values in nums1 that are NOT in nums2
 *   [1] — unique values in nums2 that are NOT in nums1
 *
 * Brute Force Time : O(n × m) — in_array() inside a loop
 * Optimal Time     : O(n + m) — build a HashMap, then lookup
 * Space            : O(n + m) — two HashMaps
 */

// ─────────────────────────────────────────────────────
// Approach 1 — Brute Force (in_array trap)
// ─────────────────────────────────────────────────────
// For each element in nums1, scan all of nums2 using in_array().
// in_array() is O(n) — doing it n times makes this O(n²).
// This is the common PHP developer trap.

function findDifferenceBrute(array $nums1, array $nums2): array
{
    $diff1 = [];
    foreach ($nums1 as $num) {
        if (!in_array($num, $nums2) && !in_array($num, $diff1)) {
            $diff1[] = $num;
        }
    }

    $diff2 = [];
    foreach ($nums2 as $num) {
        if (!in_array($num, $nums1) && !in_array($num, $diff2)) {
            $diff2[] = $num;
        }
    }

    return [$diff1, $diff2];
}

// ─────────────────────────────────────────────────────
// Approach 2 — HashMap (Optimal)
// ─────────────────────────────────────────────────────
// Build a HashMap for each array first — O(n) and O(m).
// Then check membership using isset() — average O(1) per lookup.
// Total: O(n + m) instead of O(n × m).
// WHY this works: PHP associative arrays use hashing internally,
// so key lookup (isset) is O(1) on average.

function findDifferenceOptimal(array $nums1, array $nums2): array
{
    // Build sets — O(n) and O(m)
    $set1 = [];
    foreach ($nums1 as $num) {
        $set1[$num] = true;
    }

    $set2 = [];
    foreach ($nums2 as $num) {
        $set2[$num] = true;
    }

    // Find differences using O(1) lookup
    $diff1 = [];
    foreach ($set1 as $num => $_) {
        if (!isset($set2[$num])) {
            $diff1[] = $num;
        }
    }

    $diff2 = [];
    foreach ($set2 as $num => $_) {
        if (!isset($set1[$num])) {
            $diff2[] = $num;
        }
    }

    return [$diff1, $diff2];
}

// ─────────────────────────────────────────────────────
// Test Cases
// ─────────────────────────────────────────────────────

echo "=== Problem 02: Find the Difference of Two Arrays ===" . PHP_EOL;
echo PHP_EOL;

// Test 1
$nums1 = [1, 2, 3];
$nums2 = [2, 4, 6];
$result = findDifferenceOptimal($nums1, $nums2);
echo "Input : nums1 = [1,2,3], nums2 = [2,4,6]" . PHP_EOL;
echo "Output: [[" . implode(',', $result[0]) . "],[" . implode(',', $result[1]) . "]]" . PHP_EOL;   // Expected: [[1,3],[4,6]]
echo PHP_EOL;

// Test 2: duplicates in input
$nums1 = [1, 2, 3, 3];
$nums2 = [1, 1, 2, 2];
$result = findDifferenceOptimal($nums1, $nums2);
echo "Input : nums1 = [1,2,3,3], nums2 = [1,1,2,2]" . PHP_EOL;
echo "Output: [[" . implode(',', $result[0]) . "],[" . implode(',', $result[1]) . "]]" . PHP_EOL;   // Expected: [[3],[]]
echo PHP_EOL;

echo "Brute Time  : O(n × m) — in_array() inside a loop" . PHP_EOL;
echo "Optimal Time: O(n + m) — HashMap lookup" . PHP_EOL;
echo "Space       : O(n + m) — two HashMaps" . PHP_EOL;
