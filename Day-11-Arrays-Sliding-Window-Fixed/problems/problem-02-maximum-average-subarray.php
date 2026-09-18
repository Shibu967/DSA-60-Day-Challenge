# Problem: Maximum Average Subarray I

---

## 📎 Problem Link

- [LeetCode 643](https://leetcode.com/problems/maximum-average-subarray-i/)

## 📊 Metadata

| Field | Value |
|-------|-------|
| Difficulty | Easy |
| Topic | Arrays |
| Pattern | Sliding Window (Fixed) |
| Attempted On | 2026-09-18 |
| Status | Solved Independently |

---

## 🧾 Problem Understanding

> Given an integer array `nums` consisting of `n` elements, and an integer `k`. Find a contiguous subarray whose length is equal to `k` that has the maximum average value and return this value.

---

## ⚡ Optimized Approach

### Key Observation
Since the window size `k` is fixed, the window that has the maximum sum will also have the maximum average. We can find the maximum sum using a sliding window and then simply return `max_sum / k` at the very end, saving us from doing floating-point division on every step.

### Pattern Used
> Sliding Window (Fixed Size)

### PHP Implementation

```php
<?php

/**
 * Problem: Maximum Average Subarray I
 * Approach: Sliding Window (Fixed Size)
 * Time: O(n)
 * Space: O(1)
 */
function findMaxAverage(array $nums, int $k): float {
    $n = count($nums);
    
    $window_sum = 0;
    
    // Step 1: Calculate sum of the first window
    for ($i = 0; $i < $k; $i++) {
        $window_sum += $nums[$i];
    }
    
    $max_sum = $window_sum;
    
    // Step 2: Slide the window over the rest of the array
    for ($i = $k; $i < $n; $i++) {
        $window_sum = $window_sum + $nums[$i] - $nums[$i - $k];
        $max_sum = max($max_sum, $window_sum);
    }
    
    // Return the average
    return $max_sum / $k;
}

// -------------------------------------------------
// Test Cases
// -------------------------------------------------
$testCases = [
    "Normal case" => [[1, 12, -5, -6, 50, 3], 4],
    "Single element" => [[5], 1],
    "All negatives" => [[-1, -2, -3, -4], 2]
];

foreach ($testCases as $caseName => $data) {
    list($nums, $k) = $data;
    echo "[$caseName]\n";
    echo "Input: k = $k, Array = [" . implode(", ", $nums) . "]\n";
    $result = findMaxAverage($nums, $k);
    echo "Output: $result\n\n";
}
?>
```

### Complexity Analysis

| | Complexity | Reason |
|-|-----------|--------|
| Time | O(n) | We process each element at most twice (once added, once removed). |
| Space | O(1) | No extra data structures are used. |
