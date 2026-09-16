# Problem: Product of Array Except Self

---

## 📎 Problem Link

- Custom Problem (Based on LeetCode 238)

## 📊 Metadata

| Field | Value |
|-------|-------|
| Difficulty | Medium |
| Topic | Arrays |
| Pattern | Prefix and Suffix Product |
| Attempted On | 2026-09-16 |
| Status | Solved After Hint |

---

## 🧾 Problem Understanding

> Given an array `nums`, return an array where each element `ans[i]` is the product of all elements in `nums` except `nums[i]`. We must solve this in O(n) time and without using the division operator.

---

## ⚡ Optimized Approach

### Key Observation
If we can't use division, we can find the product of all elements to the left of `i` and multiply it by the product of all elements to the right of `i`. To optimize space to O(1) (excluding the output array), we can calculate the prefix product directly into the answer array, and then multiply it by a running suffix product in a second right-to-left pass.

### Pattern Used
> Prefix and Suffix Product

### PHP Implementation

```php
<?php

/**
 * Problem: Product of Array Except Self
 *
 * Approach:
 * 1. Store Prefix Product in the output array.
 * 2. Traverse Right -> Left with a running Suffix Product.
 * 3. Multiply stored Prefix by current Suffix.
 *
 * Time: O(n)
 * Extra Space: O(1) excluding output array
 */
function productExceptSelf(array $nums): array
{
    $n = count($nums);

    if ($n === 0) {
        return [];
    }

    // Output array will initially store Prefix Products.
    $answer = array_fill(0, $n, 1);

    // -------------------------------------------------
    // Step 1: Store Prefix Product in $answer
    // -------------------------------------------------

    $prefixProduct = 1;

    for ($i = 0; $i < $n; $i++) {

        // Store product of all elements to the LEFT.
        $answer[$i] = $prefixProduct;

        // Include current element for the next index.
        $prefixProduct *= $nums[$i];
    }

    // -------------------------------------------------
    // Step 2: Traverse Right -> Left
    // -------------------------------------------------

    $suffixProduct = 1;

    for ($i = $n - 1; $i >= 0; $i--) {

        // Prefix × Suffix = Product Except Self
        $answer[$i] *= $suffixProduct;

        // Include current element for the next index.
        $suffixProduct *= $nums[$i];
    }

    return $answer;
}

// -------------------------------------------------
// Test Cases
// -------------------------------------------------
$testCases = [
    "Normal case" => [1, 2, 3, 4],
    "Single zero" => [-1, 1, 0, -3, 3],
    "Multiple zeros" => [0, 4, 0],
    "Small input" => [2, 3]
];

foreach ($testCases as $caseName => $nums) {
    echo "[$caseName]\n";
    echo "Input: [" . implode(", ", $nums) . "]\n";
    $result = productExceptSelf($nums);
    echo "Output: [" . implode(", ", $result) . "]\n\n";
}
?>
```

### Complexity Analysis

| | Complexity | Reason |
|-|-----------|--------|
| Time | O(n) | We iterate over the array in two separate passes (left-to-right, then right-to-left). |
| Space | O(1) | Excluding the output array, we only use two integer variables (`$prefixProduct`, `$suffixProduct`), completely eliminating the O(n) auxiliary space overhead. |
