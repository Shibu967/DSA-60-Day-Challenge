# Day 05 — Complexity Pattern Recognition

> **Date:** 2026-09-07
> **Phase:** Phase 1 — Foundations
> **Difficulty Level:** Beginner

---

## 1. 🎯 Learning Objective

- [x] Identify O(n) patterns by looking at loop structure
- [x] Identify O(n²) patterns — nested loops vs separate loops
- [x] Identify O(log n) patterns — halving each step
- [x] Identify O(n log n) — sorting-based complexity
- [x] Understand in-place modification and O(1) auxiliary space
- [x] Understand why `in_array()` inside a loop is a hidden O(n²) trap
- [x] Use HashMap to optimize O(n²) brute force to O(n)

---

## 2. 📚 Theory

### What is Complexity Pattern Recognition?

Reading code and immediately identifying its time and space complexity without running it. This is a core interview skill. The goal is to look at the **loop structure** — not individual lines — to determine how the algorithm scales.

### Why does it matter?

Two solutions can produce the same correct output. But one might be O(n) and the other O(n²). For large inputs, that difference means the difference between a solution that works in production and one that times out.

---

## 3. 🧩 Core Concepts

### Concept 1 — Single Loop → O(n)

```php
for ($i = 0; $i < $n; $i++) {
    echo $i;
}
```

The loop runs `n` times. One operation per step. Time grows linearly with input.

| | Complexity |
|---|---|
| Time | O(n) |
| Space | O(1) |

---

### Concept 2 — Two Separate Loops → O(n), NOT O(n²)

```php
for ($i = 0; $i < $n; $i++) { echo $i; }
for ($j = 0; $j < $n; $j++) { echo $j; }
```

```
O(n) + O(n) = O(2n) = O(n)
```

| | Complexity |
|---|---|
| Time | O(n) |
| Space | O(1) |

> **Important:** The number of loops does not decide complexity. The **nested relationship** between loops decides it. Two separate loops add their complexities — they do NOT multiply.

---

### Concept 3 — Nested Loop → O(n²)

```php
for ($i = 0; $i < $n; $i++) {
    for ($j = 0; $j < $n; $j++) {
        echo $i . " " . $j;
    }
}
```

Outer loop runs `n` times. For each of those, inner loop runs `n` times. Total = n × n = n².

| | Complexity |
|---|---|
| Time | O(n²) |
| Space | O(1) |

---

### Concept 4 — Halving Pattern → O(log n)

```php
$i = $n;
while ($i > 1) {
    $i = intdiv($i, 2);
}
```

```
n → n/2 → n/4 → n/8 → ... → 1
```

The input is cut in half each step. It takes log₂(n) steps to reach 1.

| | Complexity |
|---|---|
| Time | O(log n) |
| Space | O(1) |

> **Simple rule:** If the variable is halved (or divided by any constant) each step → O(log n).

---

### Concept 5 — Function Called n Times with Inner Loop → O(n²)

```php
function processArray($arr) {
    foreach ($arr as $value) { echo $value; }  // O(n)
}

for ($i = 0; $i < $n; $i++) {
    processArray($arr);   // called n times
}
```

```
Outer loop = n
Function inside = n
Total = n × n = n²
```

| | Complexity |
|---|---|
| Time | O(n²) |
| Space | O(1) |

> A function call hides the inner loop. Always look inside the function to count total work.

---

### Concept 6 — In-place Modification → O(1) Auxiliary Space

```php
for ($i = 1; $i < count($nums); $i++) {
    $nums[$i] += $nums[$i - 1];   // modify the input directly
}
```

No new array is created. We modify the existing array directly. The only extra memory used is the loop variable `$i`.

| | Complexity |
|---|---|
| Time | O(n) |
| Auxiliary Space | O(1) |

> **Auxiliary space** = extra memory the algorithm uses, NOT counting the input itself.

---

### Concept 7 — `in_array()` Trap → Hidden O(n²)

```php
foreach ($nums1 as $num) {              // O(n)
    if (!in_array($num, $nums2)) {      // O(n) per call — hidden!
        $result[] = $num;
    }
}
```

```
O(n) × O(n) = O(n²)
```

`in_array()` scans the entire array linearly each time it is called. Placing it inside a loop multiplies the complexity.

| | Complexity |
|---|---|
| Time | O(n²) — the in_array() trap |
| Space | O(n) |

---

### Concept 8 — HashMap Optimization → O(n²) to O(n)

Instead of calling `in_array()` in a loop, build a HashMap first.

```php
// Build the map — O(n)
$set = [];
foreach ($nums2 as $num) {
    $set[$num] = true;
}

// Lookup — average O(1) per check
if (isset($set[$num])) { ... }
```

```
Build: O(n)
Lookup: O(1) average
Total: O(n + n) = O(n)
```

| | Complexity |
|---|---|
| Time | O(n) |
| Space | O(n) — the HashMap |

> **Interview note:** HashMap lookup is always treated as average O(1). This is the standard assumption.

---

### Concept 9 — Sorting → O(n log n)

```php
sort($nums);   // O(n log n)
$smallest = $nums[0];         // O(1)
$largest  = $nums[count($nums) - 1];  // O(1)
```

PHP's `sort()` runs in O(n log n). After sorting, the smallest and largest values are always at known index positions.

| | Complexity |
|---|---|
| Time | O(n log n) — sorting dominates |
| Auxiliary Space | O(1) — in-place sort |

---

## 4. 🧠 Mental Model / Intuition

**How to read any code for complexity:**

```
Step 1: Find all loops
Step 2: Are they nested or separate?
         Nested → multiply     → O(n × m)
         Separate → add        → O(n + m) = O(n)
Step 3: Does any loop halve its variable? → O(log n)
Step 4: Any function calls inside loops?
         → look inside that function — count its cost too
Step 5: Is in_array() / linear search inside a loop?
         → likely O(n²) — replace with HashMap
```

**Key Insight:**

The trap that catches most beginners: two separate loops look like they should be O(n²), but they are O(n). Nested loops look simple but are actually O(n²). Always check whether loops are *inside* each other or *after* each other.

---

## 5. 🔄 Dry Run

### Two Sum — HashMap Approach

```
Input: nums = [2, 7, 11, 15], target = 9
```

| Step | i | num | complement (9 - num) | In Map? | Map State |
|------|---|-----|----------------------|---------|-----------|
| 1 | 0 | 2 | 7 | No | {2:0} |
| 2 | 1 | 7 | 2 | Yes → [0, 1] | — |

Answer found at step 2. No need to continue. This is O(n) — single pass with O(1) lookup per step.

Compare with brute force:
- Step 1: check (2,7) → sum = 9 → found
- Best case: O(1), Worst case: O(n²) (last pair)

---

## 6. 💻 Basic Implementation

```php
<?php

/**
 * Day 05 — Core concept demonstrations
 * Showing the key patterns for complexity recognition
 */

// ─────────────────────────────────────────
// Concept: in_array() trap vs HashMap
// ─────────────────────────────────────────

$nums1 = [1, 2, 3, 4, 5];
$nums2 = [3, 5, 7];

// Slow — O(n²) — in_array inside loop
$result_slow = [];
foreach ($nums1 as $num) {
    if (!in_array($num, $nums2)) {   // O(n) per call
        $result_slow[] = $num;
    }
}

// Fast — O(n) — HashMap lookup
$set = [];
foreach ($nums2 as $num) {
    $set[$num] = true;               // build once — O(n)
}

$result_fast = [];
foreach ($nums1 as $num) {
    if (!isset($set[$num])) {        // O(1) lookup
        $result_fast[] = $num;
    }
}

echo "Slow result: " . implode(', ', $result_slow) . PHP_EOL;  // 1, 2, 4
echo "Fast result: " . implode(', ', $result_fast) . PHP_EOL;  // 1, 2, 4
```

### What this implementation shows:
- Both produce the same result
- The slow version is O(n²) because `in_array()` is called n times, each taking O(n)
- The fast version is O(n) because HashMap lookup is O(1)
- This is the most important optimization pattern for PHP developers

---

## 7. 🧩 Patterns Learned

| Pattern | Code Signal | Complexity |
|---------|-------------|------------|
| Single loop | `for`, `foreach` | O(n) |
| Two separate loops | loop, then another loop | O(n) |
| Nested loops | loop inside loop | O(n²) |
| Halving pattern | `$i /= 2`, `$i *= 2` | O(log n) |
| Function called n times, inner loop | outer loop + function with inner loop | O(n²) |
| In-place modification | `$arr[$i] += ...` | O(1) auxiliary space |
| `in_array()` inside loop | linear search inside iteration | O(n²) TRAP |
| HashMap lookup | `isset($map[$key])` | O(1) average |
| PHP `sort()` | `sort($arr)` | O(n log n) |

---

## 8. 🔢 Problems Solved

| # | Problem | Platform | Difficulty | Pattern Used | Status | Time | Space |
|---|---------|----------|------------|--------------|--------|------|-------|
| 1 | Running Sum of 1d Array | LeetCode | Easy | Single loop, in-place | ✅ Solved Independently | O(n) | O(1) |
| 2 | Find the Difference of Two Arrays | LeetCode | Easy | HashMap optimization | ✅ Solved Independently | O(n+m) | O(n+m) |
| 3 | Count Items Matching a Rule | LeetCode | Easy | Single loop, index mapping | ✅ Solved Independently | O(n) | O(1) |
| 4 | Maximum Product Difference | LeetCode | Easy | Sort, then index access | ✅ Solved Independently | O(n log n) | O(1) |
| 5 | How Many Numbers Are Smaller | LeetCode | Easy | Brute O(n²) → Sort + prefix O(n log n) | ✅ Solved Independently | O(n log n) | O(n) |
| 6 | Contains Duplicate | LeetCode | Easy | Brute O(n²) → HashMap O(n) | ✅ Solved Independently | O(n) | O(n) |
| 7 | Two Sum | LeetCode | Easy | Brute O(n²) → HashMap O(n) | ✅ Solved Independently | O(n) | O(n) |

---

## 9. ❌ Mistakes and Learnings

### What confused me today:

- Initially thought two separate loops = O(n²) — it is actually O(n)
- Forgot that `in_array()` is O(n) internally — it looks like a simple check but it scans the entire array
- In Problem 5, handling duplicates in the sorted array was tricky — needed to store only the **first** occurrence index

### What became clearer today:

- Loop structure matters more than loop count — nested = multiply, separate = add
- Every time you write `in_array()` inside a loop, ask: can I pre-build a HashMap instead?
- Auxiliary space is only the *extra* memory used — the input array itself is not counted
- `sort()` is O(n log n) — always state this in interviews when you sort before your O(n) logic

---

## 10. 📝 Revision Notes

- 📌 Single loop = O(n)
- 📌 Two separate loops = O(n), NOT O(n²)
- 📌 Nested loops (same input) = O(n²)
- 📌 Loop halving each step = O(log n)
- 📌 `in_array()` = O(n) — inside a loop it becomes O(n²)
- 📌 HashMap lookup = O(1) average — always safe to assume in interviews
- 📌 `sort()` = O(n log n)
- 📌 Auxiliary space = extra memory only, not counting input
- 📌 In-place modification = O(1) auxiliary space

---

## 11. 📋 Day Summary

| Metric | Value |
|--------|-------|
| Problems Attempted | 7 |
| Solved Independently | 7 |
| Solved After Hint | 0 |
| Studied from Solution | 0 |
| New Patterns Learned | 9 |
| Time Spent (approx.) | — |

**Key Learning of the Day:**
> Two separate loops add (O(n) + O(n) = O(n)). Nested loops multiply (O(n) × O(n) = O(n²)). HashMap turns O(n²) linear search into O(n).

**Confidence Level:** 🟢 High

**Revision Needed:** Light — review the in_array() trap and the separate vs nested loop rule

**Tomorrow's Topic Preview:** Day 06 — Complexity in Real Code (analyzing complete algorithms end-to-end)

---

> *"Pattern recognition speed is what separates good programmers from great interviewers."*
