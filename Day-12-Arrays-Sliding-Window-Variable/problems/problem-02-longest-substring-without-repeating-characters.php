# Problem: Longest Substring Without Repeating Characters

---

## 📎 Problem Link

- [LeetCode 3](https://leetcode.com/problems/longest-substring-without-repeating-characters/)

## 📊 Metadata

| Field | Value |
|-------|-------|
| Difficulty | Medium |
| Topic | Strings |
| Pattern | Sliding Window (Variable) + Hash Set |
| Attempted On | 2026-09-19 |
| Status | Solved Independently |

---

## 🧾 Problem Understanding

> Given a string `s`, find the length of the longest substring without repeating characters.

---

## ⚡ Optimized Approach

### Key Observation
We use a variable-size sliding window with a Hash Set. 
- Expand: Add characters to the set if they are unique, and update the max length.
- Shrink: If we encounter a duplicate character, we shrink the window from the left by removing characters from the set until the duplicate is gone. 

**Rule of thumb for Maximum window problems:** Invalid hone par shrink karo, valid hone ke baad answer update karo.

### Pattern Used
> Sliding Window (Variable Size) + Hash Set

### PHP Implementation

```php
<?php

/**
 * Problem: Longest Substring Without Repeating Characters
 * Approach: Sliding Window + Hash Set
 * Time: O(n)
 * Space: O(min(n, m)) where m is the size of the charset
 */
function lengthOfLongestSubstring(string $s): int
{
    $left = 0;
    $max_length = 0;

    // Associative array ko Set ki tarah use karenge
    $set = [];

    for ($right = 0; $right < strlen($s); $right++) {
        $char = $s[$right];

        // Agar character already window mein hai,
        // toh left se shrink karo jab tak valid na ho
        while (isset($set[$char])) {
            unset($set[$s[$left]]);
            $left++;
        }

        // Naya character Set mein add karo
        $set[$char] = true;

        // Current valid window ki length
        $current_length = $right - $left + 1;

        // Maximum length update karo
        $max_length = max($max_length, $current_length);
    }

    return $max_length;
}

// -------------------------------------------------
// Test Cases
// -------------------------------------------------
$testCases = [
    "Normal case" => "abcabcbb",
    "All same" => "bbbbb",
    "Subsequence not substring" => "pwwkew",
    "Empty string" => ""
];

foreach ($testCases as $caseName => $str) {
    echo "[$caseName]\n";
    echo "Input: \"$str\"\n";
    $result = lengthOfLongestSubstring($str);
    echo "Output: $result\n\n";
}
?>
```

### Complexity Analysis

| | Complexity | Reason |
|-|-----------|--------|
| Time | O(n) | Each character is visited at most twice (once added to the window, once removed). |
| Space | O(min(n, m)) | Hash Set stores characters in the current window. In worst case for English alphabet, size is 26. |
