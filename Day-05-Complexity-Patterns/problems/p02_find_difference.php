<?php

/**
 * Problem   : Find the Difference of Two Arrays
 * Link      : https://leetcode.com/problems/find-the-difference-of-two-arrays/
 * Difficulty: Easy
 * Day       : 05 — Complexity Pattern Recognition
 *
 * ─────────────────────────────────────────
 * DESCRIPTION:
 * nums1 के वो unique values find करो जो nums2 में नहीं हैं।
 * nums2 के वो unique values find करो जो nums1 में नहीं हैं।
 *
 * Input : nums1 = [1, 2, 3], nums2 = [2, 4, 6]
 * Output: [[1, 3], [4, 6]]
 *
 * ─────────────────────────────────────────
 * APPROACH 1 — Brute Force (in_array trap)
 * foreach nums1 → in_array check in nums2 → O(n × m) = O(n²)
 *
 * APPROACH 2 — HashMap / Set (Optimal)
 * पहले nums1 और nums2 को HashMap में store करो → O(1) lookup
 * फिर compare करो → Total O(n + m)
 *
 * ─────────────────────────────────────────
 * COMPLEXITY COMPARISON:
 *
 * Brute Force:
 *   Time  : O(n × m) — in_array() loop के अंदर = hidden O(n²)
 *   Space : O(n)     — result array
 *
 * Optimal (HashMap):
 *   Time  : O(n + m) — build sets + compare
 *   Space : O(n + m) — two HashMaps
 *
 * ─────────────────────────────────────────
 * PATTERN LEARNED:
 * in_array() inside foreach = hidden O(n²) TRAP
 * HashMap/Set से O(1) lookup → O(n) solution
 * ─────────────────────────────────────────
 */

// ─── Brute Force — O(n × m) ───────────────────────────────────
function findDifferenceBrute(array $nums1, array $nums2): array
{
    // nums1 ke woh unique values jo nums2 mein nahi
    $diff1 = [];
    foreach ($nums1 as $num) {
        if (!in_array($num, $nums2) && !in_array($num, $diff1)) {
            $diff1[] = $num;
        }
    }

    // nums2 ke woh unique values jo nums1 mein nahi
    $diff2 = [];
    foreach ($nums2 as $num) {
        if (!in_array($num, $nums1) && !in_array($num, $diff2)) {
            $diff2[] = $num;
        }
    }

    // Time: O(n × m) — in_array() = O(n) inside O(n) loop
    // Space: O(n + m)
    return [$diff1, $diff2];
}

// ─── Optimal — HashMap/Set — O(n + m) ─────────────────────────
function findDifferenceOptimal(array $nums1, array $nums2): array
{
    // Step 1: Build HashMaps (Sets) — O(n), O(m)
    $set1 = [];
    foreach ($nums1 as $num) {
        $set1[$num] = true;
    }

    $set2 = [];
    foreach ($nums2 as $num) {
        $set2[$num] = true;
    }

    // Step 2: Find diff — O(n), O(m)
    $diff1 = [];
    foreach ($set1 as $num => $_) {
        if (!isset($set2[$num])) {    // O(1) lookup — HashMap magic!
            $diff1[] = $num;
        }
    }

    $diff2 = [];
    foreach ($set2 as $num => $_) {
        if (!isset($set1[$num])) {    // O(1) lookup
            $diff2[] = $num;
        }
    }

    // Time: O(n + m)  — build + compare
    // Space: O(n + m) — two HashMaps
    return [$diff1, $diff2];
}

// ─── Test Cases ───────────────────────────────────────────────
echo "=== Problem 2: Find the Difference of Two Arrays ===" . PHP_EOL . PHP_EOL;

$nums1 = [1, 2, 3];
$nums2 = [2, 4, 6];

echo "Input: nums1 = [1,2,3], nums2 = [2,4,6]" . PHP_EOL;

$brute   = findDifferenceBrute($nums1, $nums2);
$optimal = findDifferenceOptimal($nums1, $nums2);

echo "Brute Output:   [[" . implode(",", $brute[0]) . "],[" . implode(",", $brute[1]) . "]]" . PHP_EOL;
echo "Optimal Output: [[" . implode(",", $optimal[0]) . "],[" . implode(",", $optimal[1]) . "]]" . PHP_EOL;
echo "Expected:       [[1,3],[4,6]]" . PHP_EOL . PHP_EOL;

$nums1 = [1, 2, 3, 3];
$nums2 = [1, 1, 2, 2];

echo "Input: nums1 = [1,2,3,3], nums2 = [1,1,2,2]" . PHP_EOL;
$optimal = findDifferenceOptimal($nums1, $nums2);
echo "Optimal Output: [[" . implode(",", $optimal[0]) . "],[" . implode(",", $optimal[1]) . "]]" . PHP_EOL;
echo "Expected:       [[3],[]]" . PHP_EOL;
