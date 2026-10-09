<?php

/**
 * Problem 3: Find All Anagrams in a String (LeetCode 438)
 *
 * Pattern Used: Fixed Sliding Window + Frequency Map
 * Difficulty: Medium
 * Status: ✅ Solved Independently
 *
 * Approach:
 * - This is structurally identical to "Permutation in String" (LeetCode 567).
 * - Instead of returning true on the first match, we record the starting index of the window.
 * - We slide a fixed-size window (size of $p) over $s.
 * - For each step, add the incoming character to our frequency map and remove the outgoing one.
 * - We use `unset()` for zero counts to allow `==` comparison to work perfectly.
 * - If frequency maps match, push the current starting index ($i - lenP + 1) to the result array.
 *
 * Time Complexity: O(N + M) where N is length of $s and M is length of $p.
 * Space Complexity: O(26) = O(1) for frequency arrays.
 */

function findAnagrams($s, $p) {
    $lenS = strlen($s);
    $lenP = strlen($p);

    $result = [];

    // If p is longer than s, impossible to find anagrams
    if ($lenP > $lenS) {
        return $result;
    }

    $countP = [];
    $windowCount = [];

    // Frequency count for p
    for ($i = 0; $i < $lenP; $i++) {
        $char = $p[$i];
        $countP[$char] = ($countP[$char] ?? 0) + 1;
    }

    // Frequency count for the first window in s
    for ($i = 0; $i < $lenP; $i++) {
        $char = $s[$i];
        $windowCount[$char] = ($windowCount[$char] ?? 0) + 1;
    }

    // Check first window
    if ($countP == $windowCount) {
        $result[] = 0;
    }

    // Slide window
    for ($i = $lenP; $i < $lenS; $i++) {
        
        // Add incoming character
        $newChar = $s[$i];
        $windowCount[$newChar] = ($windowCount[$newChar] ?? 0) + 1;

        // Remove outgoing character
        $oldChar = $s[$i - $lenP];
        $windowCount[$oldChar]--;

        // Clean up zero counts
        if ($windowCount[$oldChar] == 0) {
            unset($windowCount[$oldChar]);
        }

        // Calculate start index of the current window
        $startIndex = $i - $lenP + 1;

        // Check if frequency maps match
        if ($countP == $windowCount) {
            $result[] = $startIndex;
        }
    }

    return $result;
}

// Tests
print_r(findAnagrams("cbaebabacd", "abc")); // Expected: [0, 6]
print_r(findAnagrams("abab", "ab")); // Expected: [0, 1, 2]

?>
