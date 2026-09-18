# Problem: Maximum Sum of Subarray of Size K

---

## 📎 Problem Link

- Custom Problem / Common Pattern

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

> Given an array of integers and a number `k`, find the maximum sum of a contiguous subarray of size `k`. We must solve this in O(n) time.

---

## ⚡ Optimized Approach

### Key Observation
Instead of recalculating the sum of `k` elements every time, we can reuse the sum of the previous window. We subtract the element going out of the window and add the element coming into the window. 
Formula: `window_sum = window_sum + arr[i] - arr[i - k]`

### Pattern Used
> Sliding Window (Fixed Size)

### PHP Implementation

```php
<?php

/**
 * Problem: Maximum Sum of Subarray of Size K
 * Approach: Sliding Window (Fixed Size)
 * Time: O(n)
 * Space: O(1)
 */
function maxSumSubarray(array $arr, int $k): int {
    $n = count($arr);
    
    // Edge case
    if ($n < $k) {
        return -1;
    }
    
    $window_sum = 0;
    
    // Step 1: Calculate sum of the first window
    for ($i = 0; $i < $k; $i++) {
        $window_sum += $arr[$i];
    }
    
    $max_sum = $window_sum;
    
    // Step 2: Slide the window over the rest of the array
    for ($i = $k; $i < $n; $i++) {
        $window_sum = $window_sum + $arr[$i] - $arr[$i - $k];
        $max_sum = max($max_sum, $window_sum);
    }
    
    return $max_sum;
}

// -------------------------------------------------
// Test Cases
// -------------------------------------------------
$testCases = [
    "Normal case" => [[2, 1, 5, 1, 3, 2], 3],
    "All negatives" => [[-1, -2, -3, -4], 2],
    "Exact size" => [[5, 2], 2]
];

foreach ($testCases as $caseName => $data) {
    list($arr, $k) = $data;
    echo "[$caseName]\n";
    echo "Input: k = $k, Array = [" . implode(", ", $arr) . "]\n";
    $result = maxSumSubarray($arr, $k);
    echo "Output: $result\n\n";
}
?>
```

### Complexity Analysis

| | Complexity | Reason |
|-|-----------|--------|
| Time | O(n) | The loop runs through the array elements at most twice, yielding a linear time complexity. |
| Space | O(1) | No extra data structures are used, just a few variables to track sums. |
