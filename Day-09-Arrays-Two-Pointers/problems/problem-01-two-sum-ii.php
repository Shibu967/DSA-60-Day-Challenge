# Problem: Two Sum II - Input array is sorted

---

## 📎 Problem Link

- Custom Problem

## 📊 Metadata

| Field | Value |
|-------|-------|
| Difficulty | Easy |
| Topic | Arrays |
| Pattern | Two Pointers |
| Attempted On | 2026-09-13 |
| Status | Solved After Hint |

---

## 🧾 Problem Understanding

> Find two numbers in a sorted array that add up to a specific target.

---

## ⚡ Optimized Approach

### Key Observation
Since the array is sorted, we can use a Left-Right Two Pointers approach to find the sum in O(n) instead of O(n²).

### Pattern Used
> Two Pointers (Left-Right)

### Algorithm (Step by Step)

1. Set `left` to index 0 and `right` to the last index.
2. Loop while `left < right`.
3. Calculate `sum = arr[left] + arr[right]`.
4. If `sum == target`, return the pair.
5. If `sum > target`, we need a smaller number, so `right--`.
6. If `sum < target`, we need a larger number, so `left++`.

### PHP Implementation

```php
<?php

/**
 * Problem: Two Sum II
 * Approach: Optimized — Two Pointers
 * Time: O(n)
 * Space: O(1)
 */
function twoSum(array $nums, int $target): array {
   $left = 0;
   $right = count($nums) - 1;
   
   while ($left < $right) {
       $sum = $nums[$left] + $nums[$right];
       
       if ($sum == $target) {
           return [$nums[$left], $nums[$right]];
       } elseif ($sum > $target) {
           $right--;
       } else {
           $left++;
       }
   }

   return [];
}
```

### Complexity Analysis

| | Complexity | Reason |
|-|-----------|--------|
| Time | O(n) | Both pointers traverse the array at most once |
| Space | O(1) | No extra memory used |
