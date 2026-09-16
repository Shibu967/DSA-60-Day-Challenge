# Problem: Range Sum Query - Immutable

---

## 📎 Problem Link

- Custom Problem (Based on LeetCode 303)

## 📊 Metadata

| Field | Value |
|-------|-------|
| Difficulty | Easy |
| Topic | Arrays |
| Pattern | Prefix Sum |
| Attempted On | 2026-09-14 |
| Status | Solved Independently |

---

## 🧾 Problem Understanding

> Given an array, answer multiple queries about the sum of elements within a specific range [L, R]. We need to do this efficiently so that each query takes O(1) time instead of O(n).

---

## ⚡ Optimized Approach

### Key Observation
By pre-calculating a cumulative sum array (Prefix Sum) in O(n) time, we can answer any range sum query in O(1) time using the formula: `prefix[R] - prefix[L-1]`.

### Pattern Used
> Prefix Sum

### PHP Implementation

```php
<?php

/**
 * Problem: Range Sum Query - Immutable
 * Approach: Optimized — Prefix Sum
 * Time: O(n) to build, O(1) per query
 * Space: O(n) for prefix array
 */

function buildPrefix(array $nums): array {
    $n = count($nums);
    if ($n == 0) return [];

    $prefix = [];
    $prefix[0] = $nums[0];
    
    for ($i = 1; $i < $n; $i++) {
        $prefix[$i] = $prefix[$i - 1] + $nums[$i];
    }
    
    return $prefix;
}

function getRangeSum(array $prefix, int $L, int $R): int {
    if ($L === 0) {
        return $prefix[$R];
    } else {
        return $prefix[$R] - $prefix[$L - 1];
    }
}
```

### Complexity Analysis

| | Complexity | Reason |
|-|-----------|--------|
| Time | O(n) build, O(1) query | We loop once to build, then use a simple subtraction formula for queries. |
| Space | O(n) | We store a new prefix array of the same size as the input. |
