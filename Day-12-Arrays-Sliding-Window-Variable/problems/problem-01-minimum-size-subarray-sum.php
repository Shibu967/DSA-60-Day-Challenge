# Problem: Minimum Size Subarray Sum

---

## 📎 Problem Link

- [LeetCode 209](https://leetcode.com/problems/minimum-size-subarray-sum/)

## 📊 Metadata

| Field | Value |
|-------|-------|
| Difficulty | Medium |
| Topic | Arrays |
| Pattern | Sliding Window (Variable Size) |
| Attempted On | 2026-09-19 |
| Status | Solved Independently |

---

## 🧾 Problem Understanding

> Given an array of positive integers `nums` and a positive integer `target`, return the minimal length of a contiguous subarray whose sum is greater than or equal to `target`. If there is no such subarray, return 0 instead.

---

## ⚡ Optimized Approach

### Key Observation
Since all numbers are positive, adding elements to our window will strictly increase the sum, and removing elements will strictly decrease it. 
We can expand our window (`right++`) until the sum is `>= target`. Once the condition is met, we record the window length and then try to shrink the window from the left (`left++`) to find the smallest possible valid length, all while the sum remains `>= target`.

### Pattern Used
> Sliding Window (Variable Size)

### PHP Implementation

```php
<?php

/**
 * Problem: Minimum Size Subarray Sum
 * Approach: Sliding Window (Variable Size)
 * Time: O(n)
 * Space: O(1)
 */
function minSubArrayLen(int $target, array $nums): int {
    $n = count($nums);
    $left = 0;
    $current_sum = 0;
    $min_length = PHP_INT_MAX; 
    
    // Expand the window
    for ($right = 0; $right < $n; $right++) {
        $current_sum += $nums[$right];
        
        // When condition is met, record answer and shrink to find the minimum
        while ($current_sum >= $target) {
            $current_length = $right - $left + 1;
            $min_length = min($min_length, $current_length);
            
            // Shrink from the left
            $current_sum -= $nums[$left];
            $left++;
        }
    }
    
    return $min_length === PHP_INT_MAX ? 0 : $min_length;
}

// -------------------------------------------------
// Test Cases
// -------------------------------------------------
$testCases = [
    "Normal case" => [7, [2, 3, 1, 2, 4, 3]],
    "Exact match single element" => [4, [1, 4, 4]],
    "Target not found" => [11, [1, 1, 1, 1, 1, 1, 1, 1]]
];

foreach ($testCases as $caseName => $data) {
    list($target, $nums) = $data;
    echo "[$caseName]\n";
    echo "Input: target = $target, Array = [" . implode(", ", $nums) . "]\n";
    $result = minSubArrayLen($target, $nums);
    echo "Output: $result\n\n";
}
?>
```

### Complexity Analysis

| | Complexity | Reason |
|-|-----------|--------|
| Time | O(n) | Each element is added to the window exactly once and removed from the window at most once. |
| Space | O(1) | We only use a few integer variables (`left`, `right`, `current_sum`, `min_length`). |
