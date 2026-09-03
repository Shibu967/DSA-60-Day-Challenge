# Day 01 — What is an Algorithm? Introduction to Complexity

> **Date:** 2026-09-03
> **Phase:** Phase 1 — Foundations
> **Difficulty Level:** Beginner

---

## 1. 🎯 Learning Objective

- [x] Understand what an algorithm is and why we analyze them
- [x] Understand time complexity and space complexity concepts
- [x] Understand Big O notation: O(1), O(n), O(n²)
- [x] Write PHP examples that demonstrate each complexity class

---

## 2. 📚 Theory

### What is an Algorithm?

An algorithm is a finite, step-by-step set of instructions designed to solve a specific problem. Every program you write uses algorithms — even a simple loop is an algorithm.

### Why Do We Analyze Algorithms?

Because code that works is not enough. Code that works efficiently matters. If your algorithm takes 1 second on 100 items but 10,000 seconds on 1 million items, it fails in production. We analyze algorithms to predict how their performance scales with input size.

### What is Time Complexity?

Time complexity is a measurement of how the number of operations in an algorithm grows as the input size grows. It is NOT measured in seconds — it is measured in terms of the input size `n`.

### What is Space Complexity?

Space complexity is a measurement of how much extra memory an algorithm uses relative to the input size.

### What is Big O Notation?

Big O notation describes the **worst-case growth rate** of an algorithm. It answers: "As `n` grows very large, how does the runtime grow?"

Common complexity classes:

| Notation | Name | Example |
|----------|------|---------|
| O(1) | Constant | Access array by index |
| O(log n) | Logarithmic | Binary search |
| O(n) | Linear | Loop through array once |
| O(n log n) | Linearithmic | Merge sort |
| O(n²) | Quadratic | Nested loops |
| O(2ⁿ) | Exponential | Naive recursion (Fibonacci) |

### Advantages of Complexity Analysis

- Helps compare algorithms before writing them
- Predicts performance at scale
- Guides optimization decisions

### Limitations

- Big O is worst-case — real performance may vary
- It ignores constants (O(100n) and O(n) are both O(n))
- It describes asymptotic behavior — may not matter for tiny inputs

---

## 3. 🧩 Core Concepts

1. **Input size `n`**: The size of the data your algorithm processes
2. **Operations**: Each step or comparison the algorithm performs
3. **Dominant term**: For large `n`, the fastest-growing term determines complexity. O(n² + n) → O(n²)
4. **Drop constants**: O(3n) → O(n). Constants are ignored in Big O.
5. **Worst case**: Big O always describes the worst possible scenario for the input

---

## 4. 🧠 Mental Model / Intuition

**Analogy:**
Imagine you are looking for a name in a phonebook.

- **O(1):** You already know the exact page — you open it instantly.
- **O(n):** You flip through every page from the beginning until you find it.
- **O(n²):** For every page you check, you re-check all previous pages (pointless, but this is how nested loops work).
- **O(log n):** You open the middle, decide which half the name is in, discard the other half, repeat. This is binary search.

**Key Insight:**
Nested loops over the same data usually mean O(n²). A single pass through the data is usually O(n).

---

## 5. 🔄 Dry Run

### Example: Finding Maximum in an Array

```
Input: [3, 7, 1, 9, 4]
Expected: 9
```

| Step | Current Index | Value | Max So Far |
|------|--------------|-------|------------|
| Start | — | — | -∞ |
| 1 | 0 | 3 | 3 |
| 2 | 1 | 7 | 7 |
| 3 | 2 | 1 | 7 |
| 4 | 3 | 9 | 9 |
| 5 | 4 | 4 | 9 |

**Observations:** We made exactly `n = 5` comparisons for 5 elements → **O(n)**

---

## 6. 💻 Basic Implementation

```php
<?php

/**
 * Day 01 — Complexity Demonstrations
 * Showing O(1), O(n), and O(n²) through simple PHP examples
 */

// ─────────────────────────────────────────
// O(1) — Constant Time
// Same number of operations regardless of input size
// ─────────────────────────────────────────
function getFirstElement(array $arr): mixed
{
    return $arr[0]; // Always 1 operation, no matter how large $arr is
}

// ─────────────────────────────────────────
// O(n) — Linear Time
// Operations grow linearly with input size
// ─────────────────────────────────────────
function findMax(array $arr): int
{
    $max = $arr[0];
    foreach ($arr as $value) {   // n iterations
        if ($value > $max) {
            $max = $value;
        }
    }
    return $max;
}

// ─────────────────────────────────────────
// O(n²) — Quadratic Time
// Nested loop — for each element, we look at every other element
// ─────────────────────────────────────────
function hasDuplicateBruteForce(array $arr): bool
{
    $n = count($arr);
    for ($i = 0; $i < $n; $i++) {           // Outer loop: n times
        for ($j = $i + 1; $j < $n; $j++) { // Inner loop: up to n times
            if ($arr[$i] === $arr[$j]) {
                return true;
            }
        }
    }
    return false;
}

// ─────────────────────────────────────────
// Test
// ─────────────────────────────────────────
$data = [3, 7, 1, 9, 4];

echo "First element (O(1)): " . getFirstElement($data) . PHP_EOL;
echo "Maximum value (O(n)): " . findMax($data) . PHP_EOL;
echo "Has duplicate (O(n²)): " . (hasDuplicateBruteForce($data) ? 'true' : 'false') . PHP_EOL;
```

### What this implementation shows:
- O(1) does exactly the same work regardless of array size
- O(n) visits each element once
- O(n²) visits every pair — grows much faster

---

## 7. 🧩 Patterns Learned

| Pattern | Description | When to Use |
|---------|-------------|-------------|
| Single Loop | Visit each element once | When you need O(n) processing |
| Nested Loop | Compare every pair | Brute force; look for optimization opportunities |

---

## 8. 🔢 Problems Solved

| # | Problem | Platform | Difficulty | Pattern Used | Status | Time | Space |
|---|---------|----------|------------|--------------|--------|------|-------|
| 1 | Find Maximum in Array | Custom | Easy | Linear scan | ✅ Solved Independently | O(n) | O(1) |
| 2 | Find Minimum in Array | Custom | Easy | Linear scan | ✅ Solved Independently | O(n) | O(1) |
| 3 | Count Even Numbers | Custom | Easy | Linear scan | ✅ Solved Independently | O(n) | O(1) |
| 4 | Sum of All Elements | Custom | Easy | Linear scan | ✅ Solved Independently | O(n) | O(1) |
| 5 | Linear Search | Custom | Easy | Linear scan + early return | ✅ Solved Independently | O(n) | O(1) |

---

## 9. ❌ Mistakes and Learnings

### What confused me today:

- Initially wrote `$sum = $sum + $val` instead of `$sum += $val` — both work, but `+=` is the standard shorthand
- In Linear Search, forgot to handle the `-1` (not found) case — learned that edge cases must always be considered

### What became clearer today:

- Big O is about WORST CASE — even if linear search finds the target at index 0, we still say O(n)
- Early return (`return $key` inside loop) is important — no need to keep checking after finding the answer
- The difference between a demo file (showing concepts) and a problem file (practicing problems) is important for clean organization

---

## 10. 📝 Revision Notes

- 📌 O(1): constant — index access, hash map lookup
- 📌 O(n): linear — single loop through data
- 📌 O(n²): quadratic — nested loop over same data
- 📌 Drop constants: O(3n) = O(n)
- 📌 Dominant term: O(n² + n) = O(n²)
- 📌 Big O = worst case behavior as n → ∞

---

## 11. 📋 Day Summary

| Metric | Value |
|--------|-------|
| Problems Attempted | 5 |
| Solved Independently | 5 |
| Solved After Hint | 0 |
| Studied from Solution | 0 |
| Time Spent (approx.) | — |

**Key Learning:** Big O describes how an algorithm scales, not how fast it runs on specific hardware.

**Confidence Level:** 🟡 Medium

**Tomorrow's Topic:** Day 02 — Big O Deep Dive (O(log n), dominant terms, best/average/worst cases)
