# Problem: Move Zeroes

---

## 📎 Problem Link

- Custom Problem

## 📊 Metadata

| Field | Value |
|-------|-------|
| Difficulty | Easy |
| Topic | Arrays |
| Pattern | Two Pointers (Slow-Fast) |
| Attempted On | 2026-09-13 |
| Status | Solved After Hint |

---

## 🧾 Problem Understanding

> Move all 0's to the end of an array while keeping the relative order of the non-zero elements. Must do it in-place.

---

## ⚡ Optimized Approach

### Key Observation
We can use a Slow pointer to track where the next non-zero element should be placed, and a Fast pointer to scan the array. After moving all non-zero elements to the front, we fill the rest of the array with zeros.

### Pattern Used
> Two Pointers (Slow-Fast)

### PHP Implementation

```php
<?php

/**
 * Problem: Move Zeroes
 * Approach: Optimized — Slow-Fast Pointers
 * Time: O(n)
 * Space: O(1)
 */
function moveZeroes(array &$arr): void {
    $insertPos = 0; 
    $n = count($arr);

    // Step 1: Move all non-zero elements to the front
    for ($i = 0; $i < $n; $i++) { 
        if ($arr[$i] == 0) {
            continue; 
        }
        
        $arr[$insertPos] = $arr[$i];
        $insertPos++;
    }

    // Step 2: Fill the rest with zeros
    while ($insertPos < $n) {
        $arr[$insertPos] = 0;
        $insertPos++;
    }
}
```

### Complexity Analysis

| | Complexity | Reason |
|-|-----------|--------|
| Time | O(n) | We iterate over the array elements sequentially. |
| Space | O(1) | In-place modification. |
