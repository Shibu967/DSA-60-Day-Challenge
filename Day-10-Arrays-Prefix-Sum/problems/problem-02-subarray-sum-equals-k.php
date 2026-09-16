# Problem: Subarray Sum Equals K

---

## 📎 Problem Link

- Custom Problem (Based on LeetCode 560)

## 📊 Metadata

| Field | Value |
|-------|-------|
| Difficulty | Medium |
| Topic | Arrays / Hash Map |
| Pattern | Prefix Sum |
| Attempted On | 2026-09-16 |
| Status | Solved After Hint |

---

## 🧾 Problem Understanding

> Given an array of integers and an integer k, find the total number of continuous subarrays whose sum equals to k.

---

## ⚡ Optimized Approach

### Key Observation
Instead of checking every subarray (O(n²)), we can keep a running sum (prefix sum). At any point, if we want a subarray that sums to `k`, we look back to see if we have previously seen a prefix sum equal to `currentSum - k`. We use a Hash Map to store the frequencies of all prefix sums we've seen.

### Pattern Used
> Prefix Sum + Hash Map

### PHP Implementation

```php
<?php

/**
 * Problem: Subarray Sum Equals K
 * Approach: Optimized — Prefix Sum + Hash Map
 * Time: O(n)
 * Space: O(n)
 */

function subarraySum(array $nums, int $k): int {
    $count = 0;       
    $currentSum = 0;  
    $map = [0 => 1];  // Base case: A sum of 0 has occurred 1 time
    
    for ($i = 0; $i < count($nums); $i++) {
        $currentSum += $nums[$i];
        
        $neededPastSum = $currentSum - $k;
        
        if (isset($map[$neededPastSum])) {
            $count += $map[$neededPastSum];
        }
        
        if (isset($map[$currentSum])) {
            $map[$currentSum]++;
        } else {
            $map[$currentSum] = 1;
        }
    }

    return $count;
}
```

### Complexity Analysis

| | Complexity | Reason |
|-|-----------|--------|
| Time | O(n) | We only iterate through the array once. Hash Map lookups are O(1). |
| Space | O(n) | In the worst case, all prefix sums are distinct and stored in the map. |
