# Problem: Contains Duplicate II

---

## 📎 Problem Link

- [LeetCode 219](https://leetcode.com/problems/contains-duplicate-ii/)

## 📊 Metadata

| Field | Value |
|-------|-------|
| Difficulty | Easy |
| Topic | Arrays |
| Pattern | Sliding Window (Fixed) + Hash Set |
| Attempted On | 2026-09-18 |
| Status | Solved Independently |

---

## 🧾 Problem Understanding

> Given an integer array `nums` and an integer `k`, return `true` if there are two distinct indices `i` and `j` in the array such that `nums[i] == nums[j]` and `abs(i - j) <= k`.

---

## ⚡ Optimized Approach

### Key Observation
We can maintain a sliding window of size `k` using a Hash Set. As we iterate through the array, we check if the current element exists in the set. If it does, we found a duplicate within distance `k`. If not, we add it to the set. If the window size exceeds `k`, we remove the oldest element from the set to maintain the memory limit.

### Pattern Used
> Sliding Window (Fixed Size) + Hash Set

### PHP Implementation

```php
<?php

/**
 * Problem: Contains Duplicate II
 * Approach: Sliding Window + Hash Set (Old remove -> Duplicate check -> New add)
 * Time: O(n)
 * Space: O(k)
 */
function containsNearbyDuplicate(array $nums, int $k): bool {
    $set = [];

    for ($i = 0; $i < count($nums); $i++) {

        // Step 1: Window se bahar ja chuka old element remove karo
        if ($i > $k) {
            unset($set[$nums[$i - $k - 1]]);
        }

        // Step 2: Current element window mein already hai? (Duplicate check)
        if (isset($set[$nums[$i]])) {
            return true;
        }

        // Step 3: Current element add karo
        $set[$nums[$i]] = true;
    }

    return false;
}

// -------------------------------------------------
// Test Cases
// -------------------------------------------------
$testCases = [
    "Duplicate within k" => [[1, 2, 3, 1], 3],
    "Duplicate exactly at k" => [[1, 0, 1, 1], 1],
    "Duplicate outside k" => [[1, 2, 3, 1, 2, 3], 2]
];

foreach ($testCases as $caseName => $data) {
    list($nums, $k) = $data;
    echo "[$caseName]\n";
    echo "Input: k = $k, Array = [" . implode(", ", $nums) . "]\n";
    $result = containsNearbyDuplicate($nums, $k);
    echo "Output: " . ($result ? "true" : "false") . "\n\n";
}
?>
```

### Complexity Analysis

| | Complexity | Reason |
|-|-----------|--------|
| Time | O(n) | We iterate through the array exactly once, and Hash Set lookups/insertions/deletions take O(1) time on average in PHP. |
| Space | O(k) | The Hash Set stores at most `k` elements at any given time. |
