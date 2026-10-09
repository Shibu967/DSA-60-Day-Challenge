<?php

/**
 * Problem 2: Permutation in String (LeetCode 567)
 *
 * Pattern Used: Fixed Sliding Window + Frequency Map
 * Difficulty: Medium
 * Status: ✅ Solved Independently (after optimizing brute force)
 *
 * Approach:
 * - We need to find if any substring of $s2 has the same characters and frequencies as $s1.
 * - This means we need to check a fixed window of size strlen($s1) across $s2.
 * - Instead of sorting (which takes O(M log M)), we use frequency maps (Hash Maps).
 * - We count the frequencies of the first window.
 * - Then, we slide the window character by character:
 *     - Add the new character entering the window to the frequency map.
 *     - Remove the old character leaving the window from the frequency map.
 *     - Important: unset() keys that reach 0 so PHP's == array comparison works exactly.
 * - If the frequency maps match at any point, a permutation exists.
 *
 * Time Complexity: O(len1 + len2) => O(N + M). We traverse both strings linearly. Array comparison takes at most O(26) = O(1).
 * Space Complexity: O(26) => O(1) for storing frequencies of English letters.
 */

function checkInclusion($s1, $s2) {
    $len1 = strlen($s1);
    $len2 = strlen($s2);

    // If s1 is longer than s2, it can't be a substring of s2
    if ($len1 > $len2) return false;

    $count1 = [];
    $count2 = [];

    // Count characters for s1
    for ($i = 0; $i < $len1; $i++) {
        $count1[$s1[$i]] = ($count1[$s1[$i]] ?? 0) + 1;
    }

    // Count characters for the first window in s2
    for ($i = 0; $i < $len1; $i++) {
        $count2[$s2[$i]] = ($count2[$s2[$i]] ?? 0) + 1;
    }

    // Check if the first window itself is a match
    if ($count1 == $count2) return true;

    // Slide the window over the rest of s2
    for ($i = $len1; $i < $len2; $i++) {

        // Add the new character entering the window
        $newChar = $s2[$i];
        $count2[$newChar] = ($count2[$newChar] ?? 0) + 1;

        // Remove the old character leaving the window
        $oldChar = $s2[$i - $len1];
        $count2[$oldChar]--;

        // Remove the key entirely if its count drops to 0
        // This ensures the array equality `==` works perfectly
        if ($count2[$oldChar] == 0) {
            unset($count2[$oldChar]);
        }

        // Check if the current window matches s1's frequency map
        if ($count1 == $count2) return true;
    }

    return false;
}

// Tests
echo checkInclusion("ab", "eidbaooo") ? "true\n" : "false\n"; // Expected: true
echo checkInclusion("ab", "eidboaoo") ? "true\n" : "false\n"; // Expected: false

?>
