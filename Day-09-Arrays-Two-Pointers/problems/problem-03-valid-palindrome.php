# Problem: Valid Palindrome

---

## 📎 Problem Link

- Custom Problem

## 📊 Metadata

| Field | Value |
|-------|-------|
| Difficulty | Easy |
| Topic | Strings |
| Pattern | Two Pointers |
| Attempted On | 2026-09-13 |
| Status | Solved After Hint |

---

## 🧾 Problem Understanding

> Check if a given string reads the same forwards and backwards. We don't need to reverse it, just verify it.

---

## ⚡ Optimized Approach

### Key Observation
We can compare characters from both ends moving towards the center. If any mismatch occurs, it's not a palindrome.

### PHP Implementation

```php
<?php

/**
 * Problem: Valid Palindrome
 * Approach: Optimized — Two Pointers
 * Time: O(n)
 * Space: O(1)
 */
function isPalindrome(string $s): bool {
    $left = 0;
    $right = strlen($s) - 1;

    while ($left < $right) {
        if ($s[$left] != $s[$right]) {
            return false;
        }
        
        $left++;
        $right--;
    }

    return true; 
}
```

### Complexity Analysis

| | Complexity | Reason |
|-|-----------|--------|
| Time | O(n) | Iterate over half the string at most. |
| Space | O(1) | No extra memory used. |
