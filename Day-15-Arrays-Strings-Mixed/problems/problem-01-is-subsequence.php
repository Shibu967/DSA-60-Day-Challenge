<?php

/**
 * Problem 1: Is Subsequence (LeetCode 392)
 *
 * Pattern Used: Two Pointers
 * Difficulty: Easy
 * Status: ✅ Solved Independently
 *
 * Approach:
 * - Use two pointers, $i for string $s and $j for string $t.
 * - Iterate through both strings simultaneously.
 * - If the characters match ($s[$i] == $t[$j]), advance the pointer $i for string $s.
 * - Always advance the pointer $j for string $t.
 * - If $i reaches the length of $s, it means all characters of $s were found in $t in order, return true.
 *
 * Time Complexity: O(T) where T is the length of string $t. We traverse $t at most once.
 * Space Complexity: O(1) as we only use two integer variables.
 */

function isSubsequence($s, $t) {
    $i = 0;
    $j = 0;

    // Run while both pointers are within their respective string boundaries
    while ($i < strlen($s) && $j < strlen($t)) {
        // If characters match, move the pointer for $s
        if ($s[$i] == $t[$j]) {
            $i++;
        }
        
        // Always move the pointer for $t
        $j++;
    }

    // If $i equals the length of $s, all characters were found
    return $i == strlen($s);
}

// Tests
echo isSubsequence("abc", "ahbgdc") ? "true\n" : "false\n"; // Expected: true
echo isSubsequence("axc", "ahbgdc") ? "true\n" : "false\n"; // Expected: false

?>
